<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class ProductTemp extends Model
{
	protected $table = 'qm_product_temp';
    public $timestamps = false;

    public function Insert_product_temp ( $data = array())
    {
    	if(isset($data['product_temp_id'])){
            return ProductTemp::where('product_temp_id', $data['product_temp_id'])->update($data);
        }
        return ProductTemp::insertGetId($data);
    }
    public function Get_product_temp_id($id)
	{
    	return ProductTemp::where('product_temp_id',$id)->first();
	}
	public function Delete_product_temp( $id = ''){
        $product_temp = $this->Get_product_temp_id($id);
        if(!$product_temp){
            return false;
        }
        ProductTemp::where('product_temp_id',$id)->delete();
    }
    //Lấy sản phẩm bán chạy 
    public function Get_top_product_temp_order($limit = 0)
    {
        $query = " SELECT product_id, title, slug 
                   FROM (SELECT *, count(product_id) as so_luong 
                   FROM qm_product_temp
                   GROUP BY product_id) as temp 
                   ORDER BY so_luong DESC ";
        if($limit){
            $query .= "LIMIT 0, $limit ";
        }
        
        
        return DB::select(DB::raw($query));
    }

}