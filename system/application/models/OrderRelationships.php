<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
class OrderRelationships extends Model
{
    public $table = 'qm_order_relationships';
    public $timestamps = false;

   	public function Insert_order_relationships( $order_id= '', $product_temp_id)
   	{
   		return OrderRelationships::insert(['order_id'=>$order_id , 'product_temp_id'=> $product_temp_id]);
   	}

   	/*Front end*/
   	public function Get_product_temp_order_id ( $order_id = '')
   	{
   		return OrderRelationships::join('qm_product_temp','qm_product_temp.product_temp_id','=','qm_order_relationships.product_temp_id')
   		->where('qm_order_relationships.order_id',$order_id)->get();
   	}
    public function Delete_order_relationships( $order_id = '')
    {
      // $order_relation = $this->Get_product_temp_order_id($order_id);
      // if(count($order_relation)==0){
      //   return false;
      // }
      OrderRelationships::where('order_id',$order_id)->delete();
      return true;
    }
    
}
