<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProductMeta extends Model
{
	protected $table = 'qm_product_meta';
    public $timestamps = false;

    public function Get_all_product_meta() {
    	return ProductMeta::where('meta_key','product_data')->get();
	}

    public function Get_product_meta($product_id = 0) {
    	return ProductMeta::where('product_id',$product_id)->first();
	}

	public function Get_product_meta_key($product_id = 0, $meta_key = '') {
		 $product_meta = ProductMeta::where('product_id',$product_id)->where('meta_key',$meta_key)->first();
		 return decode_serialize($product_meta->meta_value);
	}

	public function Get_not_product_meta_key($product_id = 0, $meta_key = '') {
		return ProductMeta::where('meta_key',$meta_key)->where('product_id','<>',$product_id)->get();
	}

	public function Get_meta_key_and_id( $product_id = 0, $meta_key = '' )
	{
    	return ProductMeta::where([
    		'product_id' => $product_id,
    		'meta_key' => $meta_key,
    	])->first();
	}

	public function Insert_product_meta($product_id = 0, $meta_key = '', $meta_value = '') {
		$data['product_id'] = $product_id;
		$data['meta_key'] = $meta_key;
		$data['meta_value'] = $meta_value;
		return ProductMeta::insert($data);
	}

	public function Update_product_meta($product_id = 0, $meta_key = '', $meta_value = '') {
		$check = $this -> Get_product_meta($product_id);
		if(!$check){
			return $this-> Insert_product_meta($product_id, $meta_key, $meta_value);
		}
		return ProductMeta::where('product_id',$product_id)->where('meta_key',$meta_key)->update(['meta_value' => $meta_value]);
	}

	public function Delete_product_meta($product_id = 0) {
		return ProductMeta::where('product_id',$product_id)->delete();
	}

	public function Delete_product_meta_key($query,$product_id = 0, $meta_key = '') {
		return ProductMeta::where('product_id',$product_id)->where('meta_key',$meta_key)->delete();
	}	
}