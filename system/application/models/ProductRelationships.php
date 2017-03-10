<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class ProductRelationships extends Model
{
	protected $table = 'qm_product_relationships';
    public $timestamps = false;

    public function Insert_product_relationships( $taxonomy_id = '', $product_id = '' ){
    	return ProductRelationships::insert(['taxonomy_id'=>$taxonomy_id, 'product_id'=> $product_id]);
    }
    //Xoas
    public function Delete_product_relationships_term( $taxonomy_id = '', $term_type = ''){
    	$query = ProductRelationships::join('qm_taxonomy','qm.term_id','=','qm_product_relationships.taxonomy_id')
    	                     ->where('qm_taxonomy.taxonomy_id',$taxonomy_id);
    	if( $term_type){
    		$query->where('qm_taxonomy.taxonomy_type',$term_type);
    	}
    	$query->delete();
    }

    //Xóa product_relationships theo mã sản phẩm
    public function Delete_product_relationships_product( $product_id = '', $term_type = ''){
    	$query = ProductRelationships::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
    	                              ->where('qm_product_relationships.product_id',$product_id);
    	if($term_type){
    		$query->where('qm_taxonomy.taxonomy_type',$term_type);
    	}
    	$query->delete();

    }
    //Đếm số sản phẩm của term
    public function Count_product_relationships_term( $taxonomy_id= ''){
    	return ProductRelationships::where('taxonomy_id',$taxonomy_id)->count();
    }

    //Lấy danh sách term của product
    public function Get_product_relationships( $product_id = '', $term_type = ''){
    	$query = ProductRelationships::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')->where('product_id', $product_id);
    	if( $term_type ){
    		$query->where('qm_taxonomy.taxonomy_type',$term_type);
    	}
    	return $query->get();
    }

 	//Lấy list id taxonomy theo sản phẩm
 	public function Get_product_relationships_list( $product_id = '', $term_type = ''){
 		return ProductRelationships::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')->where('taxonomy_type',$term_type)->where('qm_product_relationships.product_id', $product_id)->pluck('qm_taxonomy.taxonomy_id');
 	}

    public function Get_product_search($product_status = '', $search = '', $category = '')
    {
        $query = ProductRelationships::join('qm_product','qm_product.product_id', '=', 'qm_product_relationships.product_id')
                                ->join('qm_variant','qm_variant.product_id', '=', 'qm_product_relationships.product_id')
                                ->join('qm_taxonomy','qm_taxonomy.taxonomy_id', '=', 'qm_product_relationships.taxonomy_id')
                                ->select('qm_product.*')
                                ->orderBY('qm_product.product_id','DESC')
                                ->where('qm_product.product_title','like','%'.$search.'%');
        if($category){
            $query -> where('qm_taxonomy.taxonomy_type', 'product_category')->where('qm_taxonomy.taxonomy_slug', $category);
        }
        if($product_status=='all'){
             $query->where('qm_product.product_status','<>','trash');
        }else{
            $query ->where('qm_product.product_status',$product_status);
        }
        return $query->groupBy('qm_product.product_id')->paginate(10);
    }


}