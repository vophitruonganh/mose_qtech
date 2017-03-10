<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRelationships extends Model
{
	protected $table = 'qm_customer_relationships';
    public $timestamps = false;

    public function Insert_customer_relationships( $taxonomy_id = '', $customer_id = '' ){
        return CustomerRelationships::insert(['taxonomy_id'=>$taxonomy_id, 'customer_id'=> $customer_id]);
    }

    public function Delete_customer_relationships($customer_id= ''){
        return CustomerRelationships::where('customer_id',$customer_id)->delete();
    }
    public function Get_customer_relationship($customer_id = ''){
        return CustomerRelationships::where('customer_id',$customer_id)->first();
    }

    public function Count_taxonomy_relationships( $taxonomy_id = '')
    {
        return CustomerRelationships::where('taxonomy_id', $taxonomy_id)->count();
    }
}