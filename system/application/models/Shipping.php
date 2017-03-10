<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;


class Shipping extends Model
{
	protected $table = 'qm_shipping';
    public $timestamps = false;
    public function Get_shipping() {
    	return Shipping::
    		where('parent',0)
    		->where('status',1)
    		->get();
	}
	public function Get_shipping_child($Shipping_id = '') {
    	return Shipping::
    		where('parent',$Shipping_id)
    		// ->where('status',1)
    		->get();
	}
	public function check_shipping_exists($place_id = '') {
    	$shipping = Shipping::
    		where('parent',0)
    		->where('status',1)
    		->where('place',$place_id)
    		->first();
    	if($shipping){
    		return false;
    	}
    	return true;
	}
	public function check_shipping_province_exists($Shipping_id = '') {
    	$shipping = Shipping::
    		where('parent',0)
    		->where('status',1)
    		->where('Shipping_id',$Shipping_id)
    		->first();
    	if($shipping){
    		return true;
    	}
    	return false;
	}
	public function Insert_shipping($shipping_arr = array()) {
        if(isset($shipping_arr['shipping_id'])){
        	return Shipping::where('shipping_id',$shipping_arr['shipping_id'])->update($shipping_arr);
        	// return true;
        }else {
        	return Shipping::insertGetId($shipping_arr);
        }
        
	}
    public function Delete_shipping($shipping_id = 0) {
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        if(!$shipping){
        return false;
        }
        else{
            Shipping::where('shipping_id',$shipping_id)->delete();
            $shipping_child=Shipping::where('parent',$shipping_id)->get();
            foreach ($shipping_child as $child) {
                Shipping::where('parent',$child->shipping_id)->delete();
            }
            Shipping::where('parent',$shipping_id)->delete();
        }

        return true;
    }
    public function Delete_shipping_child($shipping_id = 0) {
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        if(!$shipping){
            return false;
        }
        else{
            Shipping::where('shipping_id',$shipping_id)->delete();
            Shipping::where('parent',$shipping_id)->delete();
        } 
        return true;
    }
    public function Get_shipping_id($shipping_id = 0) {
    	return Shipping::
    		// where('parent',$parent)
    		// ->where('status',1)
    		where('shipping_id',$shipping_id)
    		->first();
	}
    public function Get_shipping_district($place_id = 0,$parent = 0) {
        return Shipping::
            where('parent',$parent)
            ->where('place',$place_id)
            ->first();
    }
	public function Get_place_id($place_id = 0,$parent = 0) {
    	return Shipping::
    		where('parent',$parent)
    		->where('status',1)
    		->where('place',$place_id)
    		->first();
	}
	public function Get_shipping_all_province() {
    	return Shipping::
    		where('parent',0)
    		->where('status',1)
    		->where('place',0)
    		->get();
	}
	public function Get_shipping_all() {
    	return Shipping::
    		where('parent',0)
    		->where('status',1)
    		->where('place','<>',0)
    		->orderBY('name')
    		->get();
	}
	public function update_status_district($status='',$array=''){
		return Shipping::whereIn('shipping_id',$array)->update(['status'=>$status]);
	}
	public function get_district_not_checked($shipping_id='',$array=''){
		return Shipping::where('parent',$shipping_id)->whereNotIn('shipping_id',$array)->pluck('shipping_id');
	}
}