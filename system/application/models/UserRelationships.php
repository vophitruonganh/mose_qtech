<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class UserRelationships extends Model
{
	protected $table = 'qm_user_relationships';
    public $timestamps = false;

    public function Insert_user_relationships( $taxonomy_id = '', $user_id = '' ){
        return UserRelationships::insert(['taxonomy_id'=>$taxonomy_id, 'user_id'=> $user_id]);
    }
    public function Delete_user_relationships($user_id){
        return UserRelationships::where('user_id',$user_id)->delete();
    }
    public function Get_user_relationship($user_id){
        return UserRelationships::where('user_id',$user_id)->first();
    }
}