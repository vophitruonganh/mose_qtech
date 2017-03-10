<?php

namespace App\Http\Controllers\backend\account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\BackendController;
use Validator;
use Session;
use Cookie;
use Crypt;
use Mail;

class LoginController extends BackendController
{
    /**
     * Class Constructor
     */
    function __construct(){
        parent::__construct();
    }


    public function index(Request $request)
    {
        $data = $request->all();
        $ref = isset($data['ref']) ? $data['ref'] : '';
        if(Session::has('loginBackend')){
            return redirect('admin/dashboard');
        }

        $authorization =  Cookie::get('authorization');
        if($authorization){
            $email_cookie = (isset($authorization['email']) ) ? $authorization['email'] : '';
            $pass_cookie = (isset($authorization['password']) ) ? $authorization['password'] : '';
            $remember_cookie = (isset($authorization['remember']) ) ? true : false;

            if($email_cookie && $pass_cookie){
                $get_user = $this->m_user->remote_login_administrator($email_cookie,md5($pass_cookie))->first();
                if($get_user){
                    Session::put('loginBackend',1);
                    Session::put('user_id',$get_user->user_id);
                    Session::put('user_level',$get_user->user_level);
                    if($remember_cookie ){
                        $_arrayCookie = [
                            'email' => $email_cookie,
                            'password' => md5($pass_cookie),
                        ];

                        $encryptArrayCookie = Crypt::encrypt($_arrayCookie);
                        setcookie('rememberPassword',$encryptArrayCookie);
                    }
                    setcookie('authorization','',time()-3600,'/','.moseplus.com');
                    return redirect('admin/dashboard');
                }
            }
        }

        /*-- Login By Cookie --*/
        $cookieRememberPassword = ( isset($_COOKIE['rememberPassword']) ) ? $_COOKIE['rememberPassword'] : null;
        if( $cookieRememberPassword != null ){
            $decryptRememberPassword = Crypt::decrypt($_COOKIE['rememberPassword']);

            $email = $decryptRememberPassword['email'];
            $password = $decryptRememberPassword['password'];

            $get_user = $this->m_user->loginByRememberPassword($email,$password)->first();

            if($get_user){
                Session::put('loginBackend',1);
                Session::put('user_id',$get_user->user_id);
                Session::put('user_level',$get_user->user_level);
                return redirect('admin/dashboard');
            }
        }
        /*-- End Login By Cookie --*/

        return view('backend.pages.account.login.login',[
            'ref' => $ref,
        ]);
    }



    public function login(Request $request){
        if( Session::has('loginBackend') ){
            return redirect('admin/dashboard');
        }

        $data = $request->all();
        $ref = isset($data['ref']) ? $data['ref'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $password = isset($data['password']) ? $data['password'] : '';

        /*-- Validator --*/
        $validator = Validator::make($data,[
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không không hợp lệ.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);

        if($validator->fails()){
            return redirect('admin/login')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/

        $get_user = $this->m_user->login($email,md5($password))->first();

        if($get_user){
            Session::put('loginBackend',1);
            Session::put('user_id',$get_user->user_id);
            Session::put('user_level',$get_user->user_level);

            $rememberPassword = isset($data['remember']) ? true : false;
            if($rememberPassword){
                $_arrayCookie = [
                    'email' => $email,
                    'password' => $password,
                ];

                $encryptArrayCookie = Crypt::encrypt($_arrayCookie);
                setcookie('rememberPassword',$encryptArrayCookie);
            }

            if($get_user->user_level==1){
                $curl_arr=array(
                    'email'=> $get_user->user_email,
                    'login_time'=>time()
                );
                get_curl(Domain_Management."/api/website/account/login",$curl_arr);
            }

			if( strlen($ref) == 0 ){
                return redirect('admin/dashboard');
            }else{
                return redirect($ref);
            }
        }else{
            $validator->getMessageBag()->add('password','Email hoặc mật khẩu không đúng');
            return redirect('admin/login')->withErrors($validator)->withInput();
        }
    }

    public function logout(){
        session_start();
        session_destroy();

        Session::forget('loginBackend');
        Session::forget('user_id');
        Session::forget('user_level');

        setcookie('rememberPassword','');
        setcookie('authorization','',time()-3600,'/','.moseplus.com');
        return redirect('admin/login');
    }

    public function indexForgotPassword()
    {
        if( Session::has('loginBackend') )
        {
            return redirect('admin/dashboard');
        }

        return view('backend.pages.account.login.forgot',['suscess'=>'']);
    }

    public function submitForgotPassword(Request $request)
    {

        $data = $request->all();
        $email = isset($data['email']) ? $data['email'] : '';
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'email' => 'required',
        ],[
            'email.required' => 'Địa chỉ email không được để trống',
        ]);

        if( $validator->fails()){
            return redirect('admin/forgot-password')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/

        $get_user = $this->m_user->getByEmail($email)->first();

        if($get_user){
            $dataView = [];
            $time = time();
            $token = md5($time);

            $user_meta = $this->m_user_meta->get_User_Meta_Value($get_user->user_id,'token_reset_password');
            if($get_user->user_level == 1){
                $curl_arr = array(
                    'email' => $email,
                    'time' => $time,
                    'token' => $token
                );
                $curl = get_curl(Domain_Management."/api/website/account/forgot-password",$curl_arr);
                if(!$curl){
                    $validator->getMessageBag()->add('','Yêu cầu gửi thiết lập mật khẩu mới thất bại, vui lòng thử lại.');
                    return redirect('admin/forgot-password')->withErrors($validator)->withInput();
                }
            }

            if(!$user_meta){
                $meta_token = array(
                    'user_id' => $get_user->user_id,
                    'meta_key' => 'token_reset_password',
                    'meta_value' => $token
                );
                $this->m_user_meta->insert_User_Meta($meta_token);

                $meta_time = array(
                    'user_id' => $get_user->user_id,
                    'meta_key' => 'time_reset_password',
                    'meta_value' => $time
                );
                $this->m_user_meta->insert_User_Meta($meta_time);
            }else{
                $this->m_user_meta->update_User_Meta_Value($get_user->user_id,'token_reset_password',$token);
                $this->m_user_meta->update_User_Meta_Value($get_user->user_id,'time_reset_password',$time);
            }

            $mail_template = array(
                'token' => $token,
                'email' => $email,
                'fullname' => $get_user->user_fullname,
                'domain_mose'=> 'store',

            );

            $send_mail = get_curl(Domain_Action."/email/forgot-password",$mail_template);
            if(!$send_mail){
                $validator->getMessageBag()->add('','Yêu cầu gửi thiết lập mật khẩu mới thất bại, vui lòng thử lại.');
                return redirect('admin/forgot-password')->withErrors($validator)->withInput();
            }
            return view('backend.pages.account.login.forgot',[
                'suscess' => 'Chúng tôi đã gửi một hướng dẫn thiết lập mật khẩu mới, vui lòng kiểm tra email.'
            ]);
        }else{
            $validator->getMessageBag()->add('email','Email không tồn tại.');
            return redirect('admin/forgot-password')->withErrors($validator)->withInput();
        }
    }

    public function indexResetPassword($token)
    {
        if(Session::has('loginBackend')){
            return redirect('admin/dashboard');
        }
        $get_meta = $this->m_user_meta->get_User_Meta_Id('token_reset_password',$token);
        if($get_meta){
            $time_reset = $this->m_user_meta->get_User_Meta_Value($get_meta->user_id,'time_reset_password');
            if($time_reset){
                $time_reset = $time_reset->meta_value;
            }else {
                return redirect('admin/login');
            }
            if($time_reset+3600 < time() ){
                return view('backend.pages.account.login.reset',[
                    'error' => 'Token hết hạn',
                ]);
            }else {
                return view('backend.pages.account.login.reset',[
                    'token_reset' => $token,
                    'error' => '',
                ]);
            }
        }else{
            return view('backend.pages.account.login.reset',[
                'error' => 'Token không tồn tại',
            ]);
        }
    }

    public function submitResetPassword($token,Request $request)
    {
        if( Session::has('loginBackend') ){
            return redirect('admin/dashboard');
        }

        $data = $request->all();

        /*-- Validator --*/
        $validator = Validator::make($data,[
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ],[
            'password.required' => 'Bạn cần phải nhập mật khẩu.',
            'password.min' => 'Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự.',
            'password.confirmed' => 'Các mật khẩu này không khớp. Thử lại?',
            'password_confirmation.required' => 'Bạn cần phải nhập xác nhận mật khẩu.',
        ]);

        if( $validator->fails() ){
            return redirect('admin/reset-password/'.$token)->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/

        $get_meta = $this->m_user_meta->get_User_Meta_Id('token_reset_password',$token);
        if($get_meta){
            $time_reset = $this->m_user_meta->get_User_Meta_Value($get_meta->user_id,'time_reset_password');
            if($time_reset){
                $time_reset = $time_reset->meta_value;
            }else {
                return redirect('admin/login');
            }
            if($time_reset+3600 < time()){
                return view('backend.pages.account.login.reset',[
                    'error' => 'Token hết hạn',
                ]);
            }else{
                $update_arr = array(
                    'user_pass' => md5($data['password']),
                    'user_id' => $get_meta->user_id
                );
                $user_level = $this->m_user->get_User_Level($get_meta->user_id);
                if($user_level==1){
                    $curl_arr = array(
                        'password' => md5($data['password']),
                        'token' => $token
                    );
                    $cUrl = get_curl(Domain_Management."/api/website/account/reset-password",$curl_arr);
                    if(!$cUrl){
                        $validator->getMessageBag()->add('','Thiết lập mật khẩu mới thất bại, vui lòng thử lại!');
                        return redirect('admin/reset-password/'.$token)->withErrors($validator)->withInput();
                    }
                }
                $this->m_user->update_user($update_arr);
                $this->m_user_meta->delete_User_Meta($get_meta->user_id,'token_reset_password');
                $this->m_user_meta->delete_User_Meta($get_meta->user_id,'time_reset_password');

                Session::put('loginBackend',1);
                Session::put('user_id',$get_meta->user_id);
                Session::put('user_level',$user_level);
                return redirect('admin/dashboard');
            }
        }else{
            return view('backend.pages.account.login.reset',[
                'dataError' => 'Token không tồn tại',
            ]);
        }

    }
}
