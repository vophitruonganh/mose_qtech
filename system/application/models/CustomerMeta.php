<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerMeta;

class CustomerMeta extends Model
{
    public $table = 'qm_customer_meta';
    public $timestamps = false;

    public function Insert_customer_meta($customer_id = '',$meta_key = '', $meta_value = '')
    {
    	return CustomerMeta::insert(['customer_id' => $customer_id,'meta_key'=> $meta_key, 'meta_value' =>$meta_value ]);
    }

    public function Get_customer_meta_id($customer_id = '')
    {
    	return CustomerMeta::where('customer_id', $customer_id)->get();
    }

    public function Delete_customer_meta( $customer_id = '')
    {
        return CustomerMeta::where('customer_id', $customer_id)->delete();
    }
    public function Get_customer_meta_key($customer_id = '',$meta_key = '')
    {
        return CustomerMeta::where('customer_id', $customer_id)
        ->where('meta_key', $meta_key)
        ->first();
    }
}