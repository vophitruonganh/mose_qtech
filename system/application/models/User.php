<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'qm_user';
    public $timestamps = false;

	public function get_user($id='',$limit=0){
        if($id==''){
            return User::paginate(10);
        }
        return User::where('user_id',$id);
    }
    public function get_username($id){
        return User::where('user_id',$id)->first()->user_fullname;
    }
    // public function search_user($attrOrder, $dataOrder, $attrSearch, $dataSearch, $whereInLevel)
    // {
    // 	$query = User::orderBy($attrOrder,$dataOrder);

    // 	if( $attrSearch != null && $dataSearch != null )
    // 	{
    // 		$query = $query->where($attrSearch,'like','%'.$dataSearch.'%');
    // 	}

    // 	$query = $query->whereIn('user_level',$whereInLevel)->paginate(10);

    // 	return $query;
    // }

    public function Search_user($search = '', $user_status = '')
    {
    	$sql = User::where(function($query) use ($search){
    		$query->where('user_email','like', '%'.$search.'%')->orWhere('user_fullname','like','%'.$search.'%')->orWhere('user_phone','like', '%'.$search.'%');
    	});
    	if($user_status == '0' || $user_status == '1'){
    		$sql->where('user_status', $user_status);
    	}
    	return $sql->where('user_level','3')->paginate(10);
    }

    public function Action_user( $user_action ='', $user_id = '')
    {
    	$check = $this->getById_user($user_id, [3])->first();
    	if(!$check){
    		return false;
    	}
    	if($user_action == 'disable'){
    		return User::where('user_id', $user_id)->update(['user_status'=>0]);
    	}
    	if($user_action == 'activate'){
    		return User::where('user_id', $user_id)->update(['user_status'=>1]);
    	}
    }
    public function insert_user($data)
    {
    	if( isset($data['user_id']) )
    	{
			return User::where('user_id',$data['user_id'])->update($data);
        }
        else
        {
			return User::insertGetId($data);
        }
    }

    public function update_user($data)
    {
		return User::insert_user($data);
	}

    public function getById_user($idUser, $whereInLevel)
	{
		$query = User::where('user_id',$idUser);

		if( is_array($whereInLevel) && count($whereInLevel) > 0 )
		{
			$query = $query->whereIn('user_level',$whereInLevel);
		}

		return $query;
	}

    public function get_User_Level($user_id=0){
        return User::where('user_id',$user_id)->value('user_level');
    }

	public function delete_user($idUser)
	{
		return User::where('user_id',$idUser)->delete();
	}

	public function get_user_admin()
	{
		return User::whereIn('user_level',[1,2])->get();
	}

	public function getByUsername_user($username)
	{
		//return User::where('user_username',$username);
	}

	public function getByUsernameExceptId_user($username, $idUser)
	{
		//return User::where('user_username',$username)->where('user_id','<>',$idUser);
	}

	public function remote_login_administrator($userNameCookie,$passCookie)
	{
		return User::where( function($query) use ($userNameCookie)
        {
            $query->where('user_email','=',$userNameCookie);
            // $query->where('user_username','=',$userNameCookie)
            //     ->orWhere('user_email','=',$userNameCookie);
        })->where('user_pass',$passCookie)->where('user_status',1)->where('user_level',1);
	}

	public function loginByRememberPassword($username,$password)
	{
		return User::where( function($query) use ($username)
        {
        	$query->where('user_email','=',$username);
            // $query->where('user_username','=',$username)
            //     ->orWhere('user_email','=',$username);
        })->where('user_pass',$password)->where('user_status',1)->whereNotIn('user_level',[4]);
	}

	public function login($username, $password)
	{
		return User::where( function($query) use ($username)
        {
        	$query->where('user_email','=',$username);
            // $query->where('user_username','=',$username)
            // ->orWhere('user_email','=',$username);
        })->where('user_pass',$password)->where('user_status',1)->whereNotIn('user_level',[4]);
	}

	public function getByEmail($email)
	{
		return User::where('user_email',$email);
	}

	public function Get_user_list_order ( $search = '')
	{
		return User::join('qm_user_meta','qm_user_meta.user_id','=','qm_user.user_id')
           ->where(function($query) use ($search){
           		$query ->orwhere('qm_user.user_email','like','%'.$search.'%')->orWhere('qm_user.user_telephone','like','%'.$search.'%')
           		->orWhere('qm_user.user_fullname','like','%'.$search.'%');
           })
           
           ->take(5)->get();
	}
}
