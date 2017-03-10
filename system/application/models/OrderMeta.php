<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMeta extends Model
{
    public $table = 'qm_order_meta';
    public $timestamps = false;

    //
    public function Insert_ordermeta($order_id = '', $om_key ='', $om_value = ''){
    	$data = [];
    	$data['order_id'] = $order_id ;
    	$data['om_key'] = $om_key ;
    	$data['om_value'] = $om_value ; 
    	Ordermeta::insert($data);
    }
    //
    public function Update_ordermeta($order_id = '', $om_key = '', $om_value = ''){
        Ordermeta::where('order_id',$order_id)->where('om_key',$om_key)->update(
                ['om_value' => $om_value]
            );
    }
    //
    public function Get_order_meta_id($order_id = 0){
    	$order_meta = Ordermeta::where('order_id', $order_id)->first();
    	return decode_serialize($order_meta->om_value);
    }
    public function Get_order_meta_shipping($order_id = 0){
        return Ordermeta::where('order_id', $order_id)->where('om_key','shipping_name')->first();
    }
    public function Get_order_meta_cancel($order_id = 0){
        $order_meta = Ordermeta::where('order_id', $order_id)->where('om_key','order_cancel')->first();
        if(!$order_meta){
            return '';
        }
        return decode_serialize($order_meta->om_value);
    }
    //
    public function Delete_order_meta( $order_id){
    	Ordermeta::where('order_id', $order_id)->delete();
    }
}
