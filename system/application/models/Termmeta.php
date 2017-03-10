<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
    public $table = 'qm_taxonomy_meta';
    public $timestamps = false;
    
	public function Get_discount_meta($term_id = 0, $meta_key = '') {
    	return Termmeta::where('taxonomy_id',$term_id)->where('meta_key',$meta_key)->first();
	}
	public function Insert_discount_meta($term_id = 0, $meta_key = '', $meta_value = '') {
		$data['taxonomy_id'] = $product_id;
		$data['meta_key'] = $meta_key;
		$data['meta_value'] = $meta_value;
		return Termmeta::insert($data);
	}
	public function Update_discount_meta($term_id = 0, $meta_key = '', $meta_value = '') {
		$data['meta_value'] = $meta_value;
		return Termmeta::where('taxonomy_id',$term_id)->where('meta_key',$meta_key)->update($data);
	}
	public function Delete_discount_meta_key($term_id = 0, $meta_key = '') {
		return Termmeta::where('taxonomy_id',$term_id)->where('meta_key',$meta_key)->delete();
	}
}
