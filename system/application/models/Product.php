<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use App\Models\ProductMeta;
use App\Models\Taxonomy;
use App\Models\ProductRelationships;

class Product extends Model
{
	protected $table = 'qm_product';
    public $timestamps = false;

    public function Count_product(){
      return Product::where('product_status','public')->count();
    }
    public function Get_all_product() {
    	return Product::get();
	}
    public function Search_product_title($search='',$limit=10) {
        return Product::where('product_title','like','%'.$search.'%')->limit($limit)->get();
    }
	public function Get_product_id($product_id = 0) {
    	return Product::where('product_id',$product_id)->first();
	}
	public function Get_product_slug($slug='') {
		// return ProductMeta::where('product_id',$product_id)->where('meta_key',$meta_key);
		return Product::where('product_slug',$slug)->first();
	}

    public function Insert_product($product_arr = array()) {
    	// $data = [];
     //    $data['user_id'] = $product_arr['user_id'];
     //    $data['product_date'] = $product_arr['product_date'];
     //    $data['product_modified'] = $product_arr['product_modified'];
     //    $data['product_title'] = $product_arr['product_title'];
     //    $data['product_content'] = $product_arr['product_content'];
     //    $data['product_excerpt'] = $product_arr['product_excerpt'];
     //    $data['product_status'] = $product_arr['product_status'];
     //    $data['product_slug'] = $product_arr['product_slug'];
     //    // $data['product_parent'] = $product_arr['product_parent'];
     //    $data['product_image'] = $product_arr['product_image'];
     //    $data['comment_status'] = $product_arr['comment_status'];
        if(isset($product_arr['product_id'])){
        	return Product::where('product_id',$product_arr['product_id'])->update($product_arr);
        	// return true;
        }else {
        	return Product::insertGetId($product_arr);
        }
        
	}

	public function Update_product($product_arr = array()) {
		return Product::Insert_product($product_arr);
	}

	public function Search_product($product_status='',$search='',$sortBy='') 
	{
        

		if($product_status==''){
			return Product::join('qm_productmeta','qm_product.product_id','qm_productmeta.product_id')
        			->join('qm_user','qm_user.user_id','qm_product.user_id')
        			->where('qm_productmeta.meta_key','product_data')
                    ->where('qm_product.product_status','<>','trash')
        			->where('qm_product.product_title','like','%'.$search.'%')
        			->orderBy('qm_product.product_id',$sortBy)->paginate(10);
		}
        return Product::join('qm_productmeta','qm_product.product_id','qm_productmeta.product_id')
        			->join('qm_user','qm_user.user_id','qm_product.user_id')
        			->where('qm_product.product_status',$product_status)
                    ->where('qm_productmeta.meta_key','product_data')
        			->where('qm_product.product_title','like','%'.$search.'%')
        			->orderBy('qm_product.product_id',$sortBy)->paginate(10); 
	}

	public function Count_product_status($product_status = '') {
		$allow_product_status = array('all','public','pending','trash','draft');
        if(!in_array($product_status, $allow_product_status))
            return '0';
        //Check user 
        if($product_status=='all'){
            return Product::where('product_status','<>','trash')->count(); 
        }else {
           return Product::where('product_status',$product_status)->count();

        }
	}

    public function Action_product($checks = array(), $product_action=''){
        if($product_action == 'trash'){
            foreach ($checks as $check) 
            {
                 Product::where('product_id',$check)->update(['product_status' => 'trash']);
            }
            return true;
        }else if($product_action == 'restore'){
            foreach ($checks as $check) 
            {
                $product_meta = new ProductMeta;
                $value = $product_meta -> Get_product_meta_key($check, 'product_data');
                $old_product_status = isset($value['old_product_status']) ? : 'public';
                Product::where('product_id',$check)->update(['product_status' => $old_product_status]);
            }
            return true;
        }else if($product_action == 'delete'){
            foreach($checks as $check)
            {
                $this->Delete_product($check);
            }
            return true;
        }
        return false;
    }

    public function Delete_product( $product_id = ''){
        $product = $this->Get_product_id($product_id);
        if( count($product) == 0 ){
            return false;
        }

        $product_meta = new ProductMeta;
        $product_relationships = new ProductRelationships;
        $tax = new Taxonomy;
        $variant=new Variant;
        $variant_meta=new VariantMeta;
        $list_variants=$variant->Get_variant_product_id($product_id);
        //Xóa trong bảng product

        Product::where('product_id',$product_id)->delete();
        //Xóa trong bảng product meta
        $product_meta -> Delete_product_meta($product_id);
         //Lấy ra các variant của sản phẩm
        
        //Xóa trong bảng variant
        $variant->Delete_variant_product($product_id);
        foreach ($list_variants as $value) {
            $variant_meta->Delete_variant_meta($value->variant_id);
        }
        //Lấy list term của sản phẩm bị xóa để cập nhạt count
        $list_terms = $product_relationships->Get_product_relationships( $product_id );

        //Xóa trong product_relationships(nhóm,tag,danh mục, nhà sản xuất)
        $product_relationships->Delete_product_relationships_product( $product_id );

        //Cập nhật lại count
        if(count($list_terms)>0){
            foreach ($list_terms as $term){
                //Đếm count 
                $count = $product_relationships-> Count_product_relationships_term( $term->taxonomy_id );
                //Cấp nhật
                $tax->Update_taxonomy_count($term->taxonomy_id, $count);
            }
        }
        //End cập nhật

        addTableLog("App\Models\Logs", Session::get('user_id'), 'product', __FUNCTION__, "$product_id,0,0");
    }
	
    public function Get_product_list_order ($search = '',$limit=5)
    {
        return Product::join('qm_product_meta','qm_product_meta.product_id', '=', 'qm_product.product_id')
                      ->join('qm_variant','qm_variant.product_id', '=', 'qm_product.product_id')
                      ->groupBY('qm_product.product_id')
                      ->where('qm_product_meta.meta_key','product_data')
                      ->where('qm_product.product_title', 'like', '%'.$search.'%')
                      ->orderBy('qm_product.product_id','desc')
                      ->take($limit)->get();
    }

    /*----front-end-----*/

    public function Get_product_frontend($search = '' , $sortBy='' ,$taxonomy_type= '', $taxonomy_slug = '')
    {
        $sql = "Select qm_product.*  
                From qm_product, qm_product_relationships, qm_taxonomy
                where qm_product.product_id = qm_product_relationships.product_id AND qm_taxonomy.taxonomy_id = qm_product_relationships.taxonomy_id
                     AND qm_product.product_title LIKE '%$search%' AND qm_product.product_status = 'public'";
        if($taxonomy_slug){
            $sql .= "AND qm_taxonomy.taxonomy_slug = '$taxonomy_slug' AND qm_taxonomy.taxonomy_type = '$taxonomy_type'";
        }
        $sql.= "Group By qm_product.product_id "; 
        if(!$sortBy){
            $sql .= 'Order by qm_product.product_date desc';
        }else if($sortBy == 'alpha-asc'){
            $sql .= "Order by qm_product.product_title collate utf8_unicode_ci asc";
        }else if($sortBy == 'alpha-desc'){
            $sql .= "Order by qm_product.product_title collate utf8_unicode_ci desc";
        }
        return DB::select(DB::raw($sql));
    }

    public function Get_product_detail_frontend( $product_slug = '')
    {
        return Product::where('product_slug',$product_slug)->where('product_status', 'public')->first();
    }

    public function Get_product_slug_like( $product_slug = '')
    {
        return Product::where('product_slug',$product_slug.'%')->where('product_status', 'public')->first();
    }

    


}