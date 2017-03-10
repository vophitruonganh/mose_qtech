<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxonomyMeta extends Model
{
    protected $table = 'qm_taxonomy_meta';
    public $timestamps = false;

    public function Insert_tax_meta($tax_id = 0, $meta_key = '', $meta_value = ''){
        $data = [];
        $data['taxonomy_id'] = $tax_id;
        $data['meta_key'] = $meta_key;
        $data['meta_value'] = $meta_value;
        TaxonomyMeta::insert($data);
    }

    public function Update_tax_meta($tax_id = 0, $meta_key = '', $meta_value = ''){
        $check= $this -> Get_tax_meta_key($tax_id, $meta_key);
        if(!$check){
            return $this-> Insert_tax_meta( $tax_id, $meta_key, $meta_value);
        }
        return TaxonomyMeta::where('taxonomy_id',$tax_id)->where('meta_key',$meta_key)->update(['meta_value'=>$meta_value]);
    }


    public function Get_tax_meta_key($tax_id = 0,$meta_key= '') {
        return TaxonomyMeta::where('taxonomy_id',$tax_id)->where('meta_key',$meta_key)->first();
    }
    public function Delete_taxonomy_meta($tax_id = 0) {
        TaxonomyMeta::where('taxonomy_id',$tax_id)->delete();
    }
    public function Delete_taxonomy_meta_key($tax_id = 0,$meta_key= '') {
        TaxonomyMeta::where('taxonomy_id',$tax_id)->where('meta_key',$meta_key)->delete();
    }
}
