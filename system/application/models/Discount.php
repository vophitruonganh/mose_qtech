<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxonomy;
class Discount extends Model
{
    public $table = 'qm_discount';
    public $timestamps = false;

    public function Update_relationship_title( $group_id = '', $taxonomy_type = '', $title = '')
    {
    	$taxonomy = new Taxonomy;
    	$check = $taxonomy->Get_taxonomy_id($taxonomy_type, $group_id);
    	if(!$check){
    		return false;
    	}
    	$discount_offer = 0;
    	if($taxonomy_type == 'customer_group'){
    		$discount_offer = 5;
    	}
    	if($taxonomy_type == 'product_group' ){
    		$discount_offer = 3;
    	}
    	return Discount::where('relationship_id', $group_id)->where('discount_offer', $discount_offer)->update(['relationship_title' => $title ]);
    }
    public function max_group_customer_discount($relationship_id = 0,$discount_option='',$time='')
    {
        return Discount::
            where('discount_type',2)
            ->where('discount_status',1)
            ->where('discount_offer',5)
            ->where('discount_date_start','<=',$time)
            ->where(function($query) use ($time){
                        $query->where('discount_date_end','>=',$time)
                        ->orWhere('discount_date_end','<=',0);
            })
            ->where('relationship_id',$relationship_id)
            ->where('discount_option',$discount_option)
            ->max('discount_take');
    }
    public function get_group_customer_discount($time,$relationship_id='')
    {
        if($relationship_id!=''){
            return Discount::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_discount.relationship_id')
                ->where('relationship_id',$relationship_id)
                ->where('discount_offer',5)
                ->where('discount_type',2)
                ->where('discount_status',1)
                ->where('discount_date_start','<=',$time)
                ->where(function($query) use ($time){
                    $query->where('discount_date_end','>=',$time)
                    ->orWhere('discount_date_end','<=',0);
                })
                ->groupBY('qm_discount.discount_option')
                ->groupBY('qm_discount.relationship_id')
                ->get();
        }
        return Discount::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_discount.relationship_id')
            ->where('discount_offer',5)
            ->where('discount_type',2)
            ->where('discount_status',1)
            ->where('discount_date_start','<=',$time)
            ->where(function($query) use ($time){
                $query->where('discount_date_end','>=',$time)
                ->orWhere('discount_date_end','<=',0);
            })
            ->groupBY('qm_taxonomy.taxonomy_id')->get();
    }
    public function max_group_product_discount($relationship_id = 0,$discount_option='',$time='')
    {
        return Discount::
            where('discount_type',2)
            ->where('discount_status',1)
            ->where('discount_offer',3)
            ->where('discount_date_start','<=',$time)
            ->where(function($query) use ($time){
                        $query->where('discount_date_end','>=',$time)
                        ->orWhere('discount_date_end','<=',0);
            })
            ->where('relationship_id',$relationship_id)
            ->where('discount_option',$discount_option)
            ->max('discount_take');
    }
    public function get_group_product_discount($time,$relationship_id='')
    {
        if($relationship_id!=''){
            return Discount::join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_discount.relationship_id')
                ->where('relationship_id',$relationship_id)
                ->where('discount_offer',3)
                ->where('discount_type',2)
                ->where('discount_status',1)
                ->where('discount_date_start','<=',$time)
                ->where(function($query) use ($time){
                    $query->where('discount_date_end','>=',$time)
                    ->orWhere('discount_date_end','<=',0);
                })
                ->groupBY('qm_discount.discount_option')
                ->groupBY('qm_discount.relationship_id')
                ->get();
        }
    }
}
