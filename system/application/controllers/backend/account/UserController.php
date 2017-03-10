<?php

namespace App\Http\Controllers\backend\account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

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

class UserController extends BackendController
{
    public function index(Request $request)
    {
        $data = $request->all();
        $userObject = new User;

        $user_status = isset($data['user_status']) ? $data['user_status'] : '';
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $search = isset($data['search']) ? $data['search'] : '';
        $check = isset($data['check']) ? $data['check'] : [];

        $select_action_arr = ['edit', 'delete', 'disable', 'activate'];
        $count = count($check);
        /*check dữ liệu*/
        /*end check dữ liệu*/

        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }
        if($type_request == 'ajax'){
            if($select_action){
                if(!in_array($select_action, $select_action_arr)){
                    return '{"Response":"False","Redirect":"'.url('admin/user').'"}';
                }
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/user/edit/'.$check[0]));
                    return $output;
                }
                if( ($select_action =='disable' || $select_action =='activate') && $count ){
                    foreach ($check as $v){
                        $userObject -> Action_user( $select_action, $v);
                    }
                }else if ($select_action == 'delete' && $count ){
                    foreach ( $check as $v ){
                        $this->destroy( $v );
                    }
                }
            }

            $data_view = array();
            $data_view['search'] = $search;
            $data_view['user_status'] = $user_status;
            $data_view['select_action'] = $select_action;
            $users = $userObject->Search_user($search, $user_status);
            return $this ->userView($users, $data_view);
        }else{
            if($select_action){
                if(!in_array($select_action, $select_action_arr)){
                    return redirect('admin/user');
                }
                if($select_action == 'edit' && $count){
                    return redirect('admin/user/edit/'.$check[0]);
                }
                if( ($select_action =='disable' || $select_action =='activate') && $count ){
                    foreach ($check as $v){
                        $userObject -> Action_user( $select_action, $v);
                    }
                }else if ($select_action == 'delete' && $count ){
                    foreach ( $check as $v ){
                        $this->destroy( $v );
                    }
                }

            }

            $user_page =[];
            if($search){
                $user_page['search'] = $search;
            }
            if($user_status == '0' || $user_status == '1'){
                $user_page['user_status'] = $user_status;
            }
            $users = $userObject->Search_user($search, $user_status);
            return view('backend.pages.account.user.listUser',[
                'users' => $users,
                'search' => $search,
                'user_status' => $user_status,
                'pagination'    => $user_page,
            ]);
        }
    }

    private function userView($users, $data_view = array())
    {
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.account.user.listViewUser',[
                'users'         => $users,
                'search'        => $data_view['search'],
                'user_status' => $data_view['user_status']
            ]);

        //$objdata['Page'] = urlencode($users->render());
        $user_page = [];
        if($data_view['search']){
            $user_page['search'] = $data_view['search'];
        }
        if($data_view['user_status'] == '0' || $data_view['user_status'] == '1' ){
            $user_page['user_status'] = $data_view['user_status'];
        }
        if($user_page){
            $objdata['Page'] = urlencode($users->appends($user_page)->render());
        }else{
            $objdata['Page'] = urlencode($users->render());
        }
        // $user_page = [];
        // if($data_view['search']){
        //     $objdata['Page'] = urlencode($users->appends(array('search' => $data_view['search']))->render());
        // }else if($data_view['user_status']=='0' || $data_view['user_status']=='1'){
        //     $objdata['Page'] = urlencode($users->appends(array('search' => $data_view['search'],'user_status'=>$data_view['user_status']))->render());
        // } else{
        //     $objdata['Page'] = urlencode($users->render());
        // }
        $objdata['List'] = urlencode($view);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'activate'){
            $objdata['Message'] = 'Kích hoạt nhân viên thành công!';
        }
        if($data_view['select_action'] == 'disable'){
            $objdata['Message'] = 'Vô hiệu hóa nhân viên thành công!';
        }
        if($data_view['select_action'] == 'delete'){
            $objdata['Message'] = 'Xóa nhân viên thành công!';
        }
        return $objdata;
    }
    public function create()
    {
        $userCurrentLevel = Session::get('user_level');

        if( $userCurrentLevel == 3 ) // Author
        {
            return redirect('admin');
        }

        $provincesObject = new Provinces;
        $districtsObject = new Districts;

        $provinces = $provincesObject->Get_all_provinces();
        $districts = [];
        if( Session::has('province') )
        {
            $districts = $this->m_districts->Get_districts_by_province_id(Session::get('province'));
        }

        return view('backend.pages.account.user.createUser',[
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        /*-- Validator --*/
        $validator = Validator::make($data,[
            //'username' => 'required|regex:/^[A-Za-z0-9_]+$/|between:5,32|unique:qm_user,user_username',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'email' => 'email|unique:qm_user,user_email',
            'telephone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ],[
            //'username.required' => 'Bạn cần phải nhập username',
            //'username.regex' => 'Username bao gồm ký tự hoặc là số hoặc dấu gạch dưới',
            //'username.between' => 'Username phải từ 5 đến 32 ký tự',
            //'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Bạn cần phải nhập mật khẩu',
            'password.min' => 'Mật khẩu cần có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận cần phải giống nhau',
            'password_confirmation.required' => 'Bạn cần phải xác nhận lại mật khẩu',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            'telephone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
        ]);

        if( $validator->fails()){
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
        if(!in_array($data['status'],$arrayStatus)){
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

    public function edit($idUser){
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
            if($idUser == Session::get('user_id')){
                $user = $userObject->getById_user($idUser,[])->first();
            }
            else{
                $user = $userObject->getById_user($idUser,[3])->first();
            }
        }
        else // Author
        {
            if( $idUser == Session::get('user_id') ){
                $user = $userObject->getById_user($idUser,[])->first();
            }
        }

        if(count($user) == 0) return redirect('admin');

        $userMeta = [];
        $userMeta = decode_serialize($userMetaObject->get_User_Meta_Value($idUser,'user_data'));

        $provincesObject = new Provinces;

        $provinces = $provincesObject->Get_all_provinces();
        $districts = [];
        if( Session::has('province') )
        {
            $districts = $this->m_districts->Get_districts_by_province_id(Session::get('province'));
        }

        return view('backend.pages.account.user.editUser',[
            'user' => $user,
            'userMeta' => $userMeta,
            'provinces' => $provinces,
            'districts' => $districts,
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
            // 'username' => 'required|regex:/^[A-Za-z0-9_]+$/|between:5,32|unique:qm_user,user_username,'.$idUser.',user_id',
            'password' => 'min:6|confirmed',
            'email' => 'email|unique:qm_user,user_email,'.$idUser.',user_id',
            'telephone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ],[
            // 'username.required' => 'Bạn cần phải nhập username',
            // 'username.regex' => 'Username bao gồm ký tự hoặc là số hoặc dấu gạch dưới',
            // 'username.between' => 'Username phải từ 5 đến 32 ký tự',
            // 'username.unique' => 'Username đã tồn tại',
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
        // $dataUserUpdate['user_username'] = $data['username'];

        if( strlen($data['password']) > 0 )
        {
            $dataUserUpdate['user_pass'] = md5($data['password']);
        }

        $dataUserUpdate['user_email'] = $data['email'];

        $dataUserUpdate['user_fullname'] = strip_tags(trim($data['fullname']));

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

        $dataUserUpdate['user_phone'] = $data['phone'];

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
