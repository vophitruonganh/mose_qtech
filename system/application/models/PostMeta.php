<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    public $table = 'qm_post_meta';
    public $timestamps = false;

    public function Insert_postmeta($post_id = '', $meta_key='', $meta_value = ''){
    	
    	$data = [];
    	$data['post_id'] = $post_id;
    	$data['meta_key'] = $meta_key;
    	$data['meta_value'] = $meta_value;
    	PostMeta::insert($data);
    }

    public function Update_postmeta($post_id = '', $meta_key='', $meta_value = '')
    {   
        $check = $this -> Get_postmeta_id($post_id);
        if(!$check){
            return $this-> Insert_postmeta($post_id, $meta_key, $meta_value);
        }
    	return PostMeta::where('post_id',$post_id)->where('meta_key',$meta_key)->update(['meta_value' => $meta_value]);
    }
    
    public function Delete_postmeta( $post_id = ''){
        return PostMeta::where('post_id',$post_id)->delete();
    }

    function Get_postmeta_id($post_id = ''){
        $post_meta = PostMeta::where('post_id',$post_id)->first();
        return decode_serialize($post_meta->meta_value);
    }

    function Get_postmeta_value($post_id = '',$meta_key=''){
        $post_meta = PostMeta::where('post_id',$post_id)->where('meta_key',$meta_key)->value('meta_value');
        return decode_serialize($post_meta);
    }
}
