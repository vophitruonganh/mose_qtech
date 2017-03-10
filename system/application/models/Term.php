<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Term extends Model
{
     public $table = 'qm_taxonomy';
     public $timestamps = false;

     public function Get_all_discount($all = '') {
          if($all='on'){
               return Term::join('qm_taxonomy_meta','qm_taxonomy.taxonomy_id','=','qm_taxonomy_meta.taxonomy_id')
                                    ->where('taxonomy_type','product_promotion')
                                    ->where('qm_taxonomy_meta.meta_key','product_discount')
                                    ->get();

          }
          return Term::join('qm_taxonomy_meta','qm_taxonomy.taxonomy_id','=','qm_taxonomy_meta.taxonomy_id')
                                    ->where('taxonomy_type','product_promotion')
                                    ->where('qm_taxonomy_meta.meta_key','product_discount')
                                    ->paginate(10);
     }
     public function Get_discount($term_id = 0, $type = '') {
          return Term::where('taxonomy_id',$term_id)->where('taxonomy_type',$type)->first();

     }
     public function Insert_discount($discount_arr = array()) {
          $data = [];
          $data['name'] = $discount_arr['user_id'];
          $data['slug']=$discount_arr['slug'];
          $data['parent_id'] = $discount_arr['parent_id'];
          $data['count'] = $discount_arr['count'];
          $data['taxonomy_type'] = $discount_arr['taxonomy_type'];
          return Term::insertGetId($data);   
     }
     public function Delete_discount($term_id = 0,$type = '') {
          return Term::where('taxonomy_id',$term_id)->where('taxonomy_type',$type)->delete();
     }
     public function Search_discount($search='') 
     {
          // if($product_status==''){
          //      return Term::join('qm_taxonomy_meta','qm_taxonomy.taxonomy_id','qm_taxonomy_meta.taxonomy_id')
          //           ->join('qm_user','qm_user.user_id','qm_product.user_id')
          //           ->where('qm_product.product_status','<>','trash')
          //           ->where('qm_product.product_title','like','%'.$search.'%')
          //           ->orderBy('qm_product.product_id',$sortBy)->paginate(10);
          // }
        return Term::join('qm_taxonomy_meta','qm_taxonomy.taxonomy_id','qm_taxonomy_meta.taxonomy_id')
                    ->where('qm_taxonomy.taxonomy_type','product_promotion')
                    ->where('qm_taxonomy_meta.meta_key','product_discount')
                    ->where('qm_taxonomy.taxonomy_name','like','%'.$search.'%')
                    ->get(); 
     }
     public function tag_create($values,$type,$post_id){
     	foreach($values as $value ){
     		//kiểm tra xem tên này đã có chưa
     		$check=DB::table('qm_taxonomy')->where('taxonomy_name',$value)->where('taxonomy_type',$type)->first();
     		if($check){
     			$term_id=$check->taxonomy_id;
     			$arr=array();
     			$arr['post_id']=$post_id;
     			$arr['taxonomy_id']=$term_id;
     			DB::table('qm_post_relationships')->insert($arr);

     		}else{
     			$term=array();
     			$term['name']=$value;
     			$term['slug']=slug_create('qm_term','slug',$value);
     			$term['taxonomy_type']='post_tag';
     			$term_id=DB::table('qm_taxonomy')->insertGetID($term);
     			//add vào bảng relations
     			$arr=array();
                 	$arr['post_id']=$post_id;
                 	$arr['taxonomy_id']=$term_id;
                 	DB::table('qm_post_relationships')->insert($arr);
     		}
               $count=DB::table('qm_post_relationships')->where('taxonomy_id',$term_id)->count();
               DB::table('qm_taxonomy')->where('taxonomy_id',$term_id)->update(['count'=>$count]);
     	}
          
     	return true;
     }
     public function taxonomy_relationships_delete($post_id,$type){
     	$taxonomys = DB::table('qm_taxonomy')->join('qm_post_relationships','qm_post_relationships.taxonomy_id','=','qm_taxonomy.taxonomy_id')->where('qm_post_relationships.post_id',$post_id)->where('qm_taxonomy.taxonomy_type',$type)->get();
     	if(count($taxonomys)>0){
     		foreach($taxonomys as $taxonomy){
     			DB::table('qm_post_relationships')->where('post_id',$post_id)->where('taxonomy_id',$taxonomy->taxonomy_id)->delete();
                    $count=DB::table('qm_post_relationships')->where('taxonomy_id',$taxonomy->taxonomy_id)->count();
                    DB::table('qm_taxonomy')->where('taxonomy_id',$taxonomy->taxonomy_id)->update(['taxonomy_count'=>$count]);
     		}
     	}
     }
     public function category_create($values,$type,$post_id){
     	foreach($values as $value){
     		$check=DB::table('qm_taxonomy')->where('taxonomy_name',$value)->where('taxonomy_type',$type)->first();
     		if($check){
     			$term_id=$check->taxonomy_id;
                    //thêm vào term_relation
     			$arr=array();
     			$arr['post_id']=$post_id;
     			$arr['taxonomy_id']=$term_id;
     			DB::table('qm_post_relationships')->insert($arr);
                    //cập nhật số bài post trong category
                   
     		}else{
     			$term=array();
     			$term['name']=$value;
     			$term['slug']=slug_create('qm_term','slug',$value);
     			$term_id=DB::table('qm_taxonomy')->insertGetID($term);
     			//add vào bảng relations
     			$arr=array();
     			$arr['post_id']=$post_id;
     			$arr['taxonomy_id']=$term_id;
     			DB::table('qm_post_relationships')->insert($arr);
                    //cập nhật số bài post trong category
                    
     		}
               $count=DB::table('qm_post_relationships')->where('taxonomy_id',$term_id)->count();
               DB::table('qm_taxonomy')->where('taxonomy_id',$term_id)->update(['count'=>$count]);
     	}
     	return true;
     }
     public function category_delete($post_id,$type){
     	//lấy term_id các dòng thuộc post_category
     	$categorys=DB::table('qm_taxonomy')->join('qm_post_relationships','qm_post_relationships.taxonomy_id','=','qm_taxonomy.taxonomy_id')
 								 ->where('qm_post_relationships.post_id',$post_id)
 								 ->where('qm_taxonomy.taxonomy_type',$type)	
 								 ->get();
 		//nếu tồn tại thì xóa
          if($categorys){
 			foreach ($categorys as $category) {
 				DB::table('qm_post_relationships')->where('post_id',$post_id)->where('taxonomy_id',$category->taxonomy_id)->delete();
                    //cập nhật số bài trong term
                    $count=DB::table('qm_post_relationships')->where('taxonomy_id',$category->taxonomy_id)->count();
                    DB::table('qm_taxonomy')->where('taxonomy_id',$category->taxonomy_id)->update(['count'=>$count]);
 			}
 		}
     }

     public function Get_category_post_term()
     {
          return Term::where('taxonomy_type','post_category')->where('taxonomy_count','>',0)->get();
     }

     public function Get_category_product_term()
     {
          return Term::where('taxonomy_type','product_category')->where('taxonomy_count','>',0)->get();
     }
}
