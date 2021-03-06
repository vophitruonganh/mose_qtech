<?php

namespace App\Http\Controllers\backend\account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\User;
use App\Models\Usermeta;
use Validator;
use DB;
use Session;

class UserController extends BackendController
{
    public function index(Request $request)
    {
        $data = $request->all();
        $userObject = new User;
        
        $user_action = isset($data['action_status']) ? $data['action_status'] : '';
        
        // Edit User
        if( $user_action == 'edit' )
        {
            $check = isset($data['check']) ? $data['check'] : [];
            if( count($check) == 0 )
            {
                return redirect('admin/user');
            }
            else
            {
                return redirect('admin/user/edit/'.$check[0]);
            }
        }
        //Kích hoạt User
        if($user_action == 'activate')
        {
            return 'activate';
        }

        //Vô hiệu hóa User
        if($user_action == 'disable')
        {
            return 'disable';
        }
        // Delete User
        if( $user_action == 'trash' )
        {
            $check = isset($data['check']) ? $data['check'] : [];
            if( count($check) == 0 )
            {
                return redirect('admin/user');
            }
            else
            {
                foreach( $check as $v )
                {
                    $this->destroy($v);
                }
                return redirect('admin/user');
            }
        }

        // Search
        $search = isset($data['search']) ? $data['search'] : '';
        
        $userCurrentLevel = Session::get('user_level');
        
        if( $userCurrentLevel == 1 || $userCurrentLevel == 2 ) // Superadmin or Admin
        {
            if( $search )
            {
                // Search with username
                $users = $userObject->search_user('user_id','DESC','user_username',$data['search'],[1,2,3]);
                
                // Search with email
                if( count($users) == 0 )
                {
                    $users = $userObject->search_user('user_id','DESC','user_email',$data['search'],[1,2,3]);
                }
                
                // Search with nickname
                if( count($users) == 0 )
                {
                    $users = $userObject->search_user('user_id','DESC','user_nickname',$data['search'],[1,2,3]);
                }
            }
            else
            {
                $users = $userObject->search_user('user_id','DESC',null,null,[1,2,3]);
            }
        }
        else // Author
        {
            return redirect('admin');
        }
        
        return view('backend.pages.account.user.listUser',[
            'users' => $users,
            'search' => $search,
        ]);
    }
    
    public function create()
    {
        $userCurrentLevel = Session::get('user_level');
        
        if( $userCurrentLevel == 3 ) // Author
        {
            return redirect('admin');
        }
        
        return view('backend.pages.account.user.createUser');
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'username' => 'required|regex:/^[A-Za-z0-9_]+$/|between:5,32|unique:qm_user,user_username',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'email' => 'email|unique:qm_user,user_email',
            'telephone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ],[
            'username.required' => 'Bạn cần phải nhập username',
            'username.regex' => 'Username bao gồm ký tự hoặc là số hoặc dấu gạch dưới',
            'username.between' => 'Username phải từ 5 đến 32 ký tự',
            'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Bạn cần phải nhập mật khẩu',
            'password.min' => 'Mật khẩu cần có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận cần phải giống nhau',
            'password_confirmation.required' => 'Bạn cần phải xác nhận lại mật khẩu',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            'telephone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/user/create')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/
        $checkmail = explode('@', $data['email']);
        if(strlen($checkmail[0])>=30){
            $validator->getMessageBag()->add('name','Tên email không được quá 30 kí tự ');
            return redirect('admin/user/create')->withErrors($validator)->withInput();
        }
        $time = time();
        $user = new User;
        $dataInsert = [];

        $dataInsert['user_username'] = $data['username'];
        $dataInsert['user_pass'] = md5($data['password']);
        $dataInsert['user_email'] = $data['email'];
        $dataInsert['user_nickname'] = strip_tags(trim($data['nickname']));
        $dataInsert['user_registered'] = $time;
        
        $arrayStatus = [1,0];
        if( !in_array($data['status'],$arrayStatus) )
        {
            $data['status'] = 1;
        }
        $dataInsert['user_status'] = $data['status'];
        
        $userCurrentLevel = Session::get('user_level');
        
        if( $userCurrentLevel == 1 ) // Superadmin
        {
            $arrayLevel = [2,3];
        }
        elseif( $userCurrentLevel == 2 ) // Admin
        {
            $arrayLevel = [3];
        }
        else // Author
        {
            return redirect('admin');
        }
        
        if( !in_array($data['level'],$arrayLevel) )
        {
            $data['level'] = 3;
        }
        $dataInsert['user_level'] = $data['level'];
        
        $dataInsert['user_telephone'] = $data['telephone'];
        
        $lastInsertId = $user->insert_user($dataInsert);
        
        /*-- Insert Data To UserMeta --*/
        $userMeta = new Usermeta;
        $arrayUserMeta = [];
        $dataInsertMeta = [];
            
            /*-- Address --*/
        $arrayUserMeta['user_address'] = strip_tags(trim($data['address']));
            /*-- End Address --*/
            
            /*-- Gender --*/
        $arrayGender = [1,2,3];
        if( !in_array($data['gender'],$arrayGender) )
        {
            $data['gender'] = 1;
        }
        $arrayUserMeta['user_gender'] = $data['gender'];
            /*-- End Gender --*/
            
            /*-- Facebook --*/
        $arrayUserMeta['user_facebook'] = '';
            /*-- End Facebook --*/
        
        $dataInsertMeta['user_id'] = $lastInsertId;
        $dataInsertMeta['meta_key'] = 'user_data';
        $dataInsertMeta['meta_value'] = encode_serialize($arrayUserMeta);

        $userMeta->insert_User_Meta($dataInsertMeta);
        /*-- End Insert Data To UserMeta --*/
        
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'user', __FUNCTION__, "0,0,0");
        /* END SAVE DATABASE LOG */
		
        return redirect('admin/user');
    }
    
    public function edit($idUser)
    {
        $user = [];
        $userObject = new User;
        $userMetaObject = new Usermeta;
        $userCurrentLevel = Session::get('user_level');
        
        if( $userCurrentLevel == 1 ) // Superadmin
        {
            $user = $userObject->getById_user($idUser,[1,2,3])->first();
        }
        elseif( $userCurrentLevel == 2 ) // Admin
        {
            if( $idUser == Session::get('user_id') )
            {
                $user = $userObject->getById_user($idUser,[])->first();
            }
            else
            {
                $user = $userObject->getById_user($idUser,[3])->first();
            }
        }
        else // Author
        {
            if( $idUser == Session::get('user_id') )
            {
                $user = $userObject->getById_user($idUser,[])->first();
            }
        }
        
        if( count($user) == 0 )
        {
            return redirect('admin');
        }
        
        $userMeta = [];
        $userMeta = decode_serialize($userMetaObject->get_User_Meta_Value($idUser,'user_data'));
        
        return view('backend.pages.account.user.editUser',[
            'user' => $user,
            'userMeta' => $userMeta,
        ]);
    }
    
    public function update($idUser,Request $request)
    {
        $user = [];
        $data = $request->all();
        $dataUserUpdate = [];
        $userObject = new User;
        $userMetaObject = new Usermeta;
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'username' => 'required|regex:/^[A-Za-z0-9_]+$/|between:5,32|unique:qm_user,user_username,'.$idUser.',user_id',
            'password' => 'min:6|confirmed',
            'email' => 'email|unique:qm_user,user_email,'.$idUser.',user_id',
            'telephone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ],[
            'username.required' => 'Bạn cần phải nhập username',
            'username.regex' => 'Username bao gồm ký tự hoặc là số hoặc dấu gạch dưới',
            'username.between' => 'Username phải từ 5 đến 32 ký tự',
            'username.unique' => 'Username đã tồn tại',
            'password.min' => 'Mật khẩu cần có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận cần phải giống nhau',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            'telephone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/user/edit/'.$idUser)->withErrors($validator)->withInput();
        }

        $checkmail = explode('@', $data['email']);
        if(strlen($checkmail[0])>=30){
            $validator->getMessageBag()->add('name','Tên email không được quá 30 kí tự ');
            return redirect('admin/user/edit/'.$idUser)->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/
        
        $userCurrentLevel = Session::get('user_level');
        
        if( $userCurrentLevel == 1 ) // Superadmin
        {
            $user = $userObject->getById_user($idUser,[1,2,3])->first();
        }
        elseif( $userCurrentLevel == 2 ) // Admin
        {
            if( $idUser == Session::get('user_id') )
            {
                $user = $userObject->getById_user($idUser,[])->first();
            }
            else
            {
                $user = $userObject->getById_user($idUser,[3])->first();
            }
        }
        else // Author
        {
            if( $idUser == Session::get('user_id') )
            {
                $user = $userObject->getById_user($idUser,[])->first();
            }
        }
        
        if( count($user) == 0 )
        {
            return redirect('admin');
        }
        
        $dataUserUpdate['user_id'] = $idUser;
        $dataUserUpdate['user_username'] = $data['username'];
        
        if( strlen($data['password']) > 0 )
        {
            $dataUserUpdate['user_pass'] = md5($data['password']);
        }
        
        $dataUserUpdate['user_email'] = $data['email'];
        
        $dataUserUpdate['user_nickname'] = strip_tags(trim($data['nickname']));
        
        if( $idUser == Session::get('user_id') )
        {
            $data['status'] = $user->user_status;
        }
        else
        {
            $arrayStatus = [1,0];
            if( !in_array($data['status'],$arrayStatus) )
            {
                $data['status'] = 0;
            }
        }
        $dataUserUpdate['user_status'] = $data['status'];
        
        if( $userCurrentLevel == 1 ) // Superadmin
        {
            if( $user->user_id == Session::get('user_id') )
            {
                $data['level'] = 1;
            }
            else
            {
                $arrayLevel = [2,3];
                if( !in_array($data['level'],$arrayLevel) )
                {
                    $data['level'] = 3;
                }
            }
        }
        elseif( $userCurrentLevel == 2 ) // Admin
        {
            if( $user->user_id == Session::get('user_id') )
            {
                $data['level'] = 2;
            }
            else
            {
                $data['level'] = 3;
            }
        }
        else // Auhor
        {
            $data['level'] = 3;
        }
        $dataUserUpdate['user_level'] = $data['level'];
        
        $dataUserUpdate['user_telephone'] = $data['telephone'];
        
        $userObject->update_user($dataUserUpdate);
        
        /*-- Update Data To UserMeta --*/
        $arrayUserMeta = [];
            
            /*-- Address --*/
        $arrayUserMeta['user_address'] = strip_tags(trim($data['address']));
            /*-- End Address --*/
            
            /*-- Gender --*/
        $arrayGender = [1,2,3];
        if( !in_array($data['gender'],$arrayGender) )
        {
            $data['gender'] = 1;
        }
        $arrayUserMeta['user_gender'] = $data['gender'];
            /*-- End Gender --*/
            
            /*-- Facebook --*/
        $arrayUserMeta['user_facebook'] = '';
            /*-- End Facebook --*/
        
        $userMetaObject->update_User_Meta_Value($idUser,'user_data',encode_serialize($arrayUserMeta));
        /*-- End Update Data To UserMeta --*/
        
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'user', __FUNCTION__, "0,0,0");
        /* END SAVE DATABASE LOG */
		
        if( $userCurrentLevel == 3 ) // Author
        {
            return redirect('admin/user/edit/'.$idUser);
        }
        
        return redirect('admin/user');
    }
    
    public function destroy($idUser)
    {
        $user = [];
        $userObject = new User;
        $userMetaObject = new Usermeta;
        $userCurrentLevel = Session::get('user_level');
        
        if( $userCurrentLevel == 1 ) // Superadmin
        {
            $user = $userObject->getById_user($idUser,[2,3])->first();
        }
        elseif( $userCurrentLevel == 2 ) // Admin
        {
            $user = $userObject->getById_user($idUser,[3])->first();
        }
        else // Author
        {
            return redirect('admin');
        }
        
        if( count($user) == 0 )
        {
            return redirect('admin/user');
        }
        
        $userObject->delete_user($idUser);
        $userMetaObject->delete_User_Meta($idUser,'user_data');
        $userMetaObject->delete_User_Meta($idUser,'token_reset_password');
        $userMetaObject->delete_User_Meta($idUser,'time_reset_password');
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'user', __FUNCTION__, "0,0,0");
        /* END SAVE DATABASE LOG */
        
        return redirect('admin/user');
    }
}
