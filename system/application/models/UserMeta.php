<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    public $table = 'qm_user_meta';
    public $timestamps = false;

    /*
	*  Insert User Meta
	*
	*  This function will insert user meta
	*
	*  @type    function
	*  @date    25/10/2016
	*  @since   1.0.0
	*
	*  @param   array
	*  @return  N/A
	*/
    public function insert_User_Meta($data){
		return UserMeta::insert($data);
    }

	/*
	*  Get User Meta value
	*
	*  This function will get user meta value by key 
	*
	*  @type    function
	*  @date    25/10/2016
	*  @since   1.0.0
	*
	*  @param   int, string
	*  @return  N/A
	*/
	public function get_User_Meta_Value($user_id=0, $meta_key=''){
		return UserMeta::where('user_id',$user_id)->where('meta_key',$meta_key)->first();
	}

	/*
	*  Update User Meta Value
	*
	*  This function will update user meta value by key
	*
	*  @type    function
	*  @date    25/10/2016
	*  @since   1.0.0
	*
	*  @param   int, string, string
	*  @return  N/A
	*/
	public function update_User_Meta_Value($user_id=0, $meta_key='', $meta_value=''){
		return UserMeta::where(['user_id' => $user_id,'meta_key' => $meta_key])->update(['meta_value' => $meta_value,]);
	}

	/*
	*  Delete User Meta
	*
	*  This function will delete user meta by key 
	*
	*  @type    function
	*  @date    25/10/2016
	*  @since   1.0.0
	*
	*  @param   id, string
	*  @return  N/A
	*/
	public function delete_User_Meta($user_id=0, $meta_key=''){
		return UserMeta::where(['user_id' => $user_id,'meta_key' => $meta_key])->delete();
	}

	/*
	*  Delete User Meta
	*
	*  This function will set user meta id by key and value
	*
	*  @type    function
	*  @date    25/10/2016
	*  @since   1.0.0
	*
	*  @param   string, string
	*  @return  N/A
	*/
	public function get_User_Meta_Id($meta_key='',$meta_value=''){
		return UserMeta::where(['meta_key' => $meta_key,'meta_value' => $meta_value])->first();
	}
}
