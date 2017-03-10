<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class VariantMeta extends Model
{
    protected $table = 'qm_variant_meta';
    public $timestamps = false;

    public function Get_variant_option_order($product_id){
        return Variant::join('qm_variant_meta','qm_variant.variant_id','qm_variant_meta.variant_id')
        ->where('variant_name','option_order')->where('product_id',$product_id)->get();
    }
    public function Insert_variant_meta($variant_id = '', $variant_name='', $variant_value = '', $order = 0){
    	$check = $this -> Get_variant_meta_name($variant_id,$variant_name);
    	if($check){
			return '';
		}
    	$data = [];
    	$data['variant_id'] = $variant_id;
    	$data['variant_name'] = $variant_name;
    	$data['variant_value'] = $variant_value;
        $data['variant_order'] = $order;
    	VariantMeta::insert($data);
        return 1;
    }
    function Get_variant_meta_id($variant_id = ''){
        return VariantMeta::where('qm_variant.variant_id',$variant_id)
        ->join('qm_variant','qm_variant.variant_id','qm_variant_meta.variant_id')
        ->where('variant_name','<>','option_order')
        ->orderBY('variant_order')
        ->get();
    }
    function Get_variant_meta_name($variant_id = 0, $variant_name = ''){
        return VariantMeta::join('qm_variant','qm_variant_meta.variant_id','=','qm_variant.variant_id')->
            where('qm_variant.variant_id',$variant_id)->where('qm_variant_meta.variant_name',$variant_name)->first();
    }
    function Get_variant_meta_name_value($variant_id = 0, $variant_name = '', $variant_value = ''){
        return VariantMeta::where('variant_id',$variant_id)->where('variant_name',$variant_name)->where('variant_value',$variant_value)->first();
    }
    function Get_variant_name_not_array($variant_id = '',$arr=array()){
        return VariantMeta::where('variant_id',$variant_id)->whereNotIn('variant_name', $arr)->get();
    }
    public function Update_variant_meta_name($variant_id = 0, $variant_name = '', $variant_name_new = '') {
		$check = $this -> Get_variant_meta_name($variant_id,$variant_name);
		$check_variant_name_exist = $this -> Get_variant_meta_name($variant_id,$variant_name_new);
		if(!$check || $check_variant_name_exist){
			return ;
		}
		return VariantMeta::where('variant_id',$variant_id)->where('variant_name',$variant_name)->update(['variant_name' => $variant_name_new]);
	}
    public function Update_variant_meta($variant_id = 0, $variant_name = '', $variant_value = '') {
		$check = $this -> Get_variant_meta_name($variant_id,$variant_name);
		if(!$check){
			return ;
		}
		return VariantMeta::where('variant_id',$variant_id)->where('variant_name',$variant_name)->update(['variant_value' => $variant_value]);
	}
    public function Update_variant_meta_order($variant_id = 0, $variant_name = '', $variant_order = '') {
        $check = $this -> Get_variant_meta_name($variant_id,$variant_name);
        if(!$check){
            return ;
        }
        return VariantMeta::where('variant_id',$variant_id)->where('variant_name',$variant_name)->update(['variant_order' => $variant_order]);
    }

    public function Update_variant_meta_order_by_product($product_id = 0, $variant_name = '', $variant_order = '') {
        
        return VariantMeta::join('qm_variant','qm_variant_meta.variant_id','qm_variant.variant_id')
        ->where('qm_variant.product_id',$product_id)
        ->where('qm_variant_meta.variant_name',$variant_name)
        ->update(['variant_order' => $variant_order]);
    }
    public function Update_variant_option_order($product_id = 0,$var_option = array(),$var_option_name = array(), $order=0){
        $query = "Select * 
                  From qm_variant,qm_variant_meta
                  Where qm_variant.variant_id = qm_variant_meta.variant_id and  qm_variant.product_id = $product_id ";

        $i=0;
        foreach ($var_option as $option){
            $query .= "and qm_variant.variant_id IN (
                SELECT variant_id
                From qm_variant_meta
                where variant_value = '".$var_option_name[$i]."' and variant_name = '$option'
            )" ;
            $i++;
        }
        $query .=" GROUP BY qm_variant.variant_id;";
        $variant = DB::select(DB::raw($query));
        if(!count($variant)){
            return false;
        }
        $variant_id = $variant[0]->variant_id;
        $this->Update_variant_meta($variant_id,'option_order',$order);
        return true;
        
    }
    public function get_variant_id($product_id = 0,$var_option = array(),$var_option_name = array()){
        $query = "Select * 
                  From qm_variant,qm_variant_meta
                  Where qm_variant.variant_id = qm_variant_meta.variant_id and  qm_variant.product_id = $product_id ";

        $i=0;
        foreach ($var_option as $option){
            $query .= "and qm_variant.variant_id IN (
                SELECT variant_id
                From qm_variant_meta
                where variant_value = '".$var_option_name[$i]."' and variant_name = '$option'
            )" ;
            $i++;
        }
        $query .=" GROUP BY qm_variant.variant_id;";
        $variant = DB::select(DB::raw($query));
        if(!count($variant)){
            return '';
        }
        $variant_id = $variant[0]->variant_id;
        return $variant_id;
    }
    public function Update_variant_meta_name_by_product($product_id = '',$variant_name = '',$order = 0){
        return VariantMeta::join('qm_variant','qm_variant.variant_id','qm_variant_meta.variant_id')
                ->where('product_id',$product_id)->where('variant_order',$order)
                ->update(
                    ['variant_name' => $variant_name, ] 
                );
    }
	public function Delete_variant_meta($variant_id = ''){
        return VariantMeta::where('variant_id',$variant_id)->delete();
    }
    public function Delete_variant_meta_name($variant_id = '',$variant_name = ''){
        return VariantMeta::where('variant_id',$variant_id)->where('variant_name',$variant_name)->delete();
    }
    public function Delete_variant_meta_name_by_product($product_id = '',$variant_name = ''){
        return VariantMeta::join('qm_variant','qm_variant.variant_id','qm_variant_meta.variant_id')
                ->where('product_id',$product_id)->where('variant_name',$variant_name)
                ->delete();
    }

    /*frontend*/

    //Lấy những thuộc tính đầu của sản phẩm(cho chi tiết sản phẩm)
    public function Get_list_variant_value_first( $variant_id = '')
    {
        return VariantMeta::where('variant_id',$variant_id)->where('variant_name','<>','option_order')->orderBy('variant_order')->pluck('variant_value');
    } 


}