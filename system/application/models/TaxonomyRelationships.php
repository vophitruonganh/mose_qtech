<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaxonomyRelationships extends Model
{
    protected $table = 'qm_post_relationships';
    public $timestamps = false;

    public function Insert_taxonomy_relationships($taxonomy_id = 0, $post_id = 0){
        return TaxonomyRelationships::insert(['taxonomy_id'=>$taxonomy_id, 'post_id'=> $post_id]);
    }
    public function Update_taxonomy_relationships($taxonomy_id = 0,$post_id=0,$taxonomy_id_new ='') {
        return TaxonomyRelationships::where('taxonomy_id',$taxonomy_id)->where('post_id',$post_id)->update(['taxonomy_id'=>$taxonomy_id_new]);
    }

    public function Count_taxonomy_relationships($taxonomy_id = 0) {
        return TaxonomyRelationships::where('taxonomy_id',$taxonomy_id)->count();
    }

    public function Count_taxonomy_relationships_post($post_id = 0) {
        return TaxonomyRelationships::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')->where('qm_post_relationships.post_id',$post_id)->where( function($query){
            $query->where('qm_taxonomy.taxonomy_type','post_category')->orwhere('qm_taxonomy.taxonomy_type','product_category');
        })->count();
    }
    //Lấy từ bảng term theo post_id (lấy danh mục, tag or cả 2)
    public function Get_taxonomy_type_post( $post_id =0 ,$taxonomy_type = '' ){
        $query = TaxonomyRelationships::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')->where('qm_post_relationships.post_id',$post_id);
        if($taxonomy_type){
            $query->where('qm_taxonomy.taxonomy_type',$taxonomy_type);
        }
        return $query->get();
    }

    public function Get_taxonomy_relationships($taxonomy_id = 0) {
        return TaxonomyRelationships::where('taxonomy_id',$taxonomy_id);
    }

    public function Get_taxonomy_relationships_id($taxonomy_id = 0) {
        return TaxonomyRelationships::where('taxonomy_id',$taxonomy_id)->first();
    }

    public function Delete_taxonomy_relationships($taxonomy_id = 0) {
        TaxonomyRelationships::where('taxonomy_id',$taxonomy_id)->delete();
    }

    public function Delete_taxonomy_relationships_post($post_id = 0){
        TaxonomyRelationships::where('post_id',$post_id)->delete();
    }

    public function Get_post_search($search = '', $data= array())
    {
   
        $query = TaxonomyRelationships::join('qm_post','qm_post.post_id','=','qm_post_relationships.post_id')
                              ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                              ->join('qm_user','qm_user.user_id','=','qm_post.user_id')
                              ->where('qm_post.post_title','like', '%'.$search.'%')
                              ->where('qm_post.post_type', 'post');
        //Nếu không lấy theo danh mục hoặc người đăng mới xét trạng thái bài viết
        if(!$data['category'] && !$data['user_id'] ){
            if($data['post_status']=='all' ){
                 $query->where('qm_post.post_status','<>','trash');
            }else{
                 $query->where('qm_post.post_status',$data['post_status']);
            }
        }

        if($data['category'])
        {
            $query->where('qm_taxonomy.taxonomy_slug',$data['category']);
        }

        if($data['user_id'])
        {
            $query->where('qm_post.user_id',$data['user_id']);
        }

        return $query->orderBy('qm_post.post_date',$data['sort'])->groupBy('qm_post.post_id')->paginate(10);
    }
    /*----front-end---*/
    
  public function Get_list_post_taxonomy_slug ($taxonomy_type = '', $taxonomy_slug = '' ,$post_type = '')
  {
        return TaxonomyRelationships::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                                    ->join('qm_post','qm_post.post_id','=','qm_post_relationships.post_id')
                                    ->join('qm_user','qm_user.user_id','=','qm_post.user_id')
                                    ->join('qm_post_meta','qm_post_meta.post_id','=','qm_post.post_id')
                                    ->where('qm_taxonomy.taxonomy_slug',$taxonomy_slug)
                                    ->where('qm_taxonomy.taxonomy_type', $taxonomy_type)
                                    ->where('qm_post.post_status','public')
                                    ->where('qm_post.post_type', $post_type)
                                    ->orderBY('qm_post.post_date','desc')
                                    ->paginate(9);

  }
}