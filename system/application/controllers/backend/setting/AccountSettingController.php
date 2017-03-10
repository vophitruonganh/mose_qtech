<?php

namespace App\Http\Controllers\backend\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use App\Models\User;
use App\Models\UserMeta;
use Validator;
use DB;
use Session;

class AccountSettingController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        
        $userLevel = Session::get('user_level');
        if( $userLevel == 3 ) // Author
        {
            return redirect('admin')->send();
        }
    }

    public function index()
    {

        $user = new User;
        $get_admin = $user->get_user_admin();
        $optionObject = new Option;
        
        $dateStartUsingWebsite = $optionObject->getOptionValue_option('start_date_using_website');

        return view('backend.pages.setting.account.accountSetting',[
            'dateStartUsingWebsite' => $dateStartUsingWebsite,
            //'user' => $user,
            'users'=>$get_admin
        ]);
    }
    public function stopSessionAllUser()
    {   
       Session::forget('loginBackend');
    }
    public function create()
    {
        return view('backend.pages.setting.account.createAccountSetting',[
            
        ]);
    }
    public function edit($user_id)
    {
        $user = new User;
        $user_meta = new UserMeta;
        $_user_meta = $user_meta->get_User_Meta_Value($user_id,'user_data');
        $_user = $user->get_user($user_id)->first();
        if(!$_user){
            return redirect('admin');
        }


        return view('backend.pages.setting.account.editAccountSetting',[
            'user' => $_user,
            'userMeta' => decode_serialize($_user_meta->meta_value)
        ]);
    }
}
