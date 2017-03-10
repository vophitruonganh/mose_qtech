<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*
 * Use Library of Laravel
 */
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Provinces;
use App\Models\Districts;
use Validator;
use DB;
use Session;

class UserController extends Controller
{
	public function index(){
		$user = new User;
		$users = $user->get_user();
		return $users;
	}
	public function get($id){
		$user = new User;
		$users = $user->get_user($id)->first();
		return $users;
	}
	public function store(Request $request){
		$data = $request->all();

		$email = isset($data['email'])? $data['email'] : '';
		$password = isset($data['password'])? $data['password'] : '';
		$fullname = isset($data['fullname'])? $data['fullname'] : '';
		$phone = isset($data['phone'])? $data['phone'] : '';
		$status = isset($data['status'])? $data['status'] : 1;
        $user = new User;
        $userMeta = new Usermeta;
        /*-- Validator --*/
        $validator = Validator::make($data,[
        	'email' => 'required|email|unique:qm_user,user_email',
        	'password' => 'required|min:6',
            'phone' => 'regex:/^\d{8,11}$/',
         ],[
         	'email.required'=>'Chưa nhập email',
         	'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            'password.required' => 'Bạn cần phải nhập mật khẩu',
            'password.min' => 'Mật khẩu cần có ít nhất 6 ký tự',
            'phone.regex' => 'Điện thoại phải từ 8 đến 11 số',
         ]);
        /*-- End Validator --*/
        if( $validator->fails()){
         	return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
        }

        $checkmail = explode('@', $email);
        if(strlen($checkmail[0])>=30){
            return '{"Response":"False","Message":"Tên email không được quá 30 kí tự"}';
        }

        $arrayStatus = [1,0];

        if( !in_array($status,$arrayStatus)){
            $status = 1;
        }
        $dataInsert = [];
        $dataInsert['user_fullname'] = $fullname;
        $dataInsert['user_phone'] = $phone;
        $dataInsert['user_email'] = $email;
        $dataInsert['user_pass'] = md5($password);
        $dataInsert['user_status'] = $status;
        $dataInsert['user_level'] = 3;
        $user->insert_user($dataInsert);

        return '{"Response":"True","Message":"Thêm user thành công"}';
	}

	public function destroy($idUser){
		$user = new User;
		$_user = $user->get_user($idUser)->first();
		if(!$_user){
			return '{"Response":"False","Message":"Không có user này"}';
		}
		$user->delete_user($idUser);
		return '{"Response":"True","Message":"Xóa user thành công"}';
	}

	public function update($idUser,Request $request){
		$data = $request->all();

		$email = isset($data['email'])? $data['email'] : '';
		$password = isset($data['password'])? $data['password'] : '';
		$fullname = isset($data['fullname'])? $data['fullname'] : '';
		$phone = isset($data['phone'])? $data['phone'] : '';
		$status = isset($data['status'])? $data['status'] : 1;
		$user = new User;
		/*-- Validator --*/
        $validator = Validator::make($data,[
        	'email' => 'email|unique:qm_user,user_email,'.$idUser.',user_id',
            'phone' => 'regex:/^\d{8,11}$/',
         ],[
         	'email.required'=>'Chưa nhập email',
         	'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',

            'password.min' => 'Mật khẩu cần có ít nhất 6 ký tự',
            'phone.regex' => 'Điện thoại phải từ 8 đến 11 số',
         ]);
        /*-- End Validator --*/
        if( $validator->fails() )
        {
         	return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
        }
        $checkmail = explode('@', $email);
        if(strlen($checkmail[0])>=30){
            return '{"Response":"False","Message":"Tên email không được quá 30 kí tự"}';
        }
        $_user = $user->get_user($idUser)->first();
		if(!$_user){
			return '{"Response":"False","Message":"Không có user này"}';
		}
        $dataUserUpdate = [];
        $dataUserUpdate['user_id'] = $idUser;
        if( strlen($password) > 0 )
        {
            $dataUserUpdate['user_pass'] = md5($password);
        }
        $arrayStatus = [1,0];
        if( !in_array($status,$arrayStatus) )
        {
            $status = 1;
        }
        $dataUserUpdate['user_fullname'] = $fullname;
        $dataUserUpdate['user_phone'] = $phone;
        $dataUserUpdate['user_email'] = $email;
        $dataUserUpdate['user_status'] = $status;
        $dataUserUpdate['user_level'] = 3;
		$user->update_user($dataUserUpdate);
		return '{"Response":"True","Message":"Cập nhật thành công"}';
	}
}