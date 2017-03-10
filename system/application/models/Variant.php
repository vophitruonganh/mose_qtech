<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VariantMeta;
use DB;

class Variant extends Model
{
    protected $table = 'qm_variant';
    public $timestamps = false;

    public function check_variant_by_product($product_id = 0, $variant_id = 0) {
      $variant = Variant::where('product_id',$product_id)->where('variant_id',$variant_id)->first();
      if(!$variant){
          return false;
      }
      return true;
    }
    public function Get_variant_product_id($product_id = 0) {
        return Variant::
        join('qm_product','qm_product.product_id','=','qm_variant.product_id')
        ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
        ->select('qm_variant_meta.variant_id')
        ->where('qm_product.product_id',$product_id)->groupBY('qm_variant.variant_id')
        ->get();

    }
    public function Get_variant_product_order($product_id = 0) {
        return Variant::
        join('qm_product','qm_product.product_id','=','qm_variant.product_id')
        ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
        ->where('qm_product.product_id',$product_id)->groupBY('qm_variant.variant_id')
        ->get();

    }
    
    public function Get_variant_meta_list($product_id = 0) {
        return Variant::
        join('qm_product','qm_product.product_id','=','qm_variant.product_id')
        ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
        ->select('qm_variant_meta.variant_name','qm_variant_meta.variant_value')
        ->where('qm_variant_meta.variant_name','<>','option_order')
        ->where('qm_product.product_id',$product_id)->orderBY('qm_variant.variant_id')
        ->orderBY('qm_variant_meta.variant_order')
        ->groupBY('qm_variant_meta.variant_name')->get();
    }
    public function Get_variant_meta_value($product_id = 0,$variant_name = '') {
        return Variant::
        join('qm_product','qm_product.product_id','=','qm_variant.product_id')
        ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
        ->where('qm_variant_meta.variant_name','<>','option_order')
        ->where('qm_variant_meta.variant_name',$variant_name)
        ->where('qm_product.product_id',$product_id)
        ->groupBY('qm_variant_meta.variant_value')->pluck('variant_value');
    }
    public function Get_variant_id_order_by($product_id = 0) {
    	// return Variant::join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
     //    ->where('qm_variant.product_id',$product_id)
     //    ->where('qm_variant_meta.variant_name','option_order')
     //    ->orderBY('qm_variant_meta.variant_value','/1ASC')
     //    ->get();
        $query = "select * from qm_variant,qm_variant_meta
                  where qm_variant.variant_id=qm_variant_meta.variant_id
                  and qm_variant.product_id=$product_id
                  and qm_variant_meta.variant_name='option_order'
                  ORDER BY qm_variant_meta.variant_value /1 asc;";
        return DB::select(DB::raw($query));
	}
    public function check_variant($product_id = 0,$variant_name_arr=array(),$variant_value_arr=array(),$variant_id='') {

        $query = "Select * 
                  From qm_variant,qm_variant_meta
                  Where qm_variant.variant_id = qm_variant_meta.variant_id and  qm_variant.product_id = $product_id ";

        if($variant_id!=''){
            $query .="AND qm_variant.variant_id <> '$variant_id' ";
        }
        foreach ($variant_name_arr as $key =>$v){
            $query .= "and qm_variant.variant_id IN (
                SELECT variant_id
                From qm_variant_meta
                where variant_value = '$variant_value_arr[$key]' and variant_name = '$v'
            )" ;
        }

        return DB::select(DB::raw($query));
    }
    public function Get_variant_order($product_id = 0) {
      return Variant::join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
          ->where('qm_variant.product_id',$product_id)
          ->where('qm_variant_meta.variant_name','option_order')
          ->orderBY('qm_variant_meta.variant_value','ASC')
          ->pluck('qm_variant.variant_id');
    }
    //Kiểm tra phiên bản tồn tại 
    public function get_union_variant($product_id,$variant_id,$variant_value=array(),$index){
        $query = "Select * 
                  From qm_variant,qm_variant_meta
                  Where qm_variant.variant_id = qm_variant_meta.variant_id and  qm_variant.product_id = $product_id AND qm_variant.variant_id <> '$variant_id' ";

       
        foreach ($variant_value as $key => $value){
            $query .= "and qm_variant.variant_id IN (
                SELECT variant_id
                From qm_variant_meta
                where variant_value = '".$variant_value[$key][$index]."' and variant_name = '$key'
            )" ;
        }
        return DB::select(DB::raw($query));
    }
   
                    

	public function Get_variant_id($variant_id = 0) {
        return Variant::where('variant_id',$variant_id)->first();
    }

    //mã sản phẩm
    public function Get_variant_sku($sku = 0) {
    	return Variant::where('sku',$sku)->first();
	}

    public function Insert_variant($variant_arr = array()) {
    	// $data = [];
     //    $data['product_id'] = $variant_arr['product_id'];
     //    $data['sku'] = $variant_arr['sku'];
     //    $data['price_old'] = $variant_arr['price_old'];
     //    $data['price_new'] = $variant_arr['price_new'];
     //    $data['weight'] = $variant_arr['weight'];
     //    $data['barcode'] = $variant_arr['barcode'];
     //    $data['tracking_policy'] = $variant_arr['tracking_policy'];
     //    $data['out_of_stock'] = $variant_arr['out_of_stock'];
     //    $data['quantity'] = $variant_arr['quantity'];
     //    $data['ship'] = $variant_arr['ship'];
     //    $data['image'] = $variant_arr['image'];
      if(isset($variant_arr['variant_id'])){
        return Variant::where('variant_id',$variant_arr['variant_id'])->update($variant_arr);
          // return true;
      }else {
        return Variant::insertGetId($variant_arr);
      }
        
	}

    public function Update_variant($variant_id = 0, $variant_arr = array()) {
        return Variant::where('variant_id',$variant_id)->update($variant_arr);
    }
    public function Update_variant_image($product_id = 0,$variant_id = 0, $attach_id = 0) {
        $variant = Variant::where('product_id',$product_id)->where('variant_id',$variant_id)->first();
        if(!$variant){
          return false;
        }

        return Variant::where('variant_id',$variant_id)->update(['image' => $attach_id]);
    }
    public function Delete_variant($product_id = 0, $variant_id = 0) {
      $variant = Variant::where('product_id',$product_id)->where('variant_id',$variant_id)->first();
      if(!$variant){
          return false;
      }
      else{
        $count_variant=Variant::where('product_id',$product_id)->count();
        if($count_variant==1){
            return false;
        }
      }
      Variant::where('variant_id',$variant_id)->delete();
      DB::table('qm_variant_meta')->where('variant_id',$variant_id)->delete();
      return true;
    }
    public function Delete_variant_product($product_id = 0) {
      $variant = Variant::where('product_id',$product_id)->first();
      if(!$variant){
          return false;
      }
      Variant::where('product_id',$product_id)->delete();
      
      return true;
    }

    /*-------frontend--------*/

    //Lấy variant đầu tiên của sản phẩm product_id 
    public function Get_first_variant($product_id = '')
    {
        return Variant::join('qm_product','qm_product.product_id','=','qm_variant.product_id')
        ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
        ->select('qm_variant.price_new','qm_variant.price_old','qm_variant.image','qm_variant.variant_id','qm_product.product_id','qm_product.product_title')
        ->where('qm_product.product_id',$product_id)->groupBY('qm_variant.variant_id')
        ->first();
    }

    //Lấy variant đàu tiên theo slug
    public function Get_first_variant_slug($product_slug = '')
    {
        return Variant::join('qm_product','qm_product.product_id','=','qm_variant.product_id')
        ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
        ->select('qm_variant.price_new','qm_variant.price_old','qm_variant.image','qm_variant.variant_id','qm_product.*')
        ->where('qm_product.product_slug',$product_slug)->groupBY('qm_variant.variant_id')
        ->first();
    }

    //Lấy các thuộc tính của sản phẩm
    public function Get_variant_product_detail( $product_id = '')
    {
        return  Variant::join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
                       ->where('qm_variant.product_id',$product_id)->where('qm_variant_meta.variant_name','<>','option_order')->get();
    }

    //Lấy giá của sản phẩm theo variant cụ thể
    public function Get_price_variant_product_detail( $product_id ='', $variant_id = '')
    {
        return Variant::where('product_id', $product_id)->where('variant_id', $variant_id)->first();
    }

    //Lấy list name variant_meta của sản phẩm
    public function Get_variant_name_product_detai( $product_id = '')
    {
      return Variant::join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')->where('qm_variant.product_id',$product_id)->groupBY('qm_variant_meta.variant_name')->where('qm_variant_meta.variant_name','<>','option_order')->pluck('qm_variant_meta.variant_name');
    }
    //Get list id variant
    public function Get_list_variant_id_product_detatil ( $product_id = '')
    {
      return Variant::where('product_id', $product_id)->pluck('variant_id');
    }

    //Lấy vairant_id đầu tiên theo sắp xếp option_order
    public function Get_variant_option_order_product_detail( $product_id ='' )
    {
       return Variant::join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
                      ->where('qm_variant.product_id', $product_id)->where('qm_variant_meta.variant_name','option_order')->orderBY('qm_variant_meta.variant_value','ASC')->get();
    }
}