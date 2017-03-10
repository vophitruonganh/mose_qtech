<?php

namespace App\Http\Controllers\backend\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\User;
use App\Models\Option;
use Validator;
use DB;
use Session;
use App\Libraries\Curl;

class StoreSettingController extends BackendController
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
        $optionObject = new Option;
        $storeSetting = [];

        $storeSetting['businessLicense'] = $optionObject->getOptionValue_option('business_license');
        $storeSetting['telephone'] = $optionObject->getOptionValue_option('telephone');
        $storeSetting['address'] = $optionObject->getOptionValue_option('address');
        $storeSetting['email'] = $optionObject->getOptionValue_option('email');

        return view('backend.pages.setting.storeSetting',[
            'storeSetting' => $storeSetting,
        ]);
    }

    public function save(Request $request)
    {
        $optionObject = new Option;
        $data = $request->all();

        $businessLicense = isset($data['businessLicense']) ? $data['businessLicense'] : '';
        $telephone = isset($data['telephone']) ? $data['telephone'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $email = isset($data['email']) ? $data['email'] : '';

        // Update Business License
        $optionObject->Update_option('business_license',$businessLicense);

        // Update Telephone
        $optionObject->Update_option('telephone',$telephone);

        // Update Address
        $optionObject->Update_option('address',$address);

        // Update Email
        $optionObject->Update_option('email',$email);

        return redirect('admin/setting/store');
    }
    public function update_info(Request $request)
    {
        $optionObject = new Option;
        $storeSetting = [];


        $storeSetting['telephone'] = $optionObject->getOptionValue_option('telephone');
        $storeSetting['address'] = $optionObject->getOptionValue_option('address');

        return view('backend.pages.setting.storeInfo',[
            'storeSetting' => $storeSetting,
        ]);
    }
    public function update_info_post(Request $request)
    {
        $userObject = new User;
        $user=$userObject ->getById_user(Session::get('user_id'),Session::get('user_level'));
       
        $optionObject = new Option;
        $data = $request->all();

        $telephone = isset($data['telephone']) ? $data['telephone'] : '';
        $address = isset($data['address']) ? $data['address'] : '';


        // Update Telephone
        $optionObject->Update_option('telephone',$telephone);

        // Update Address
        $optionObject->Update_option('address',$address);

        $dataPost=[];
        $dataPost['email']=$user->first()->user_email;
        $dataPost['telephone']=$data['telephone'];
        $dataPost['address']=$data['address'];
        $cUrl=new Curl;
        $cUrl->get_curl("http://qmcloud.vn/api/website/account/updateinfo",$dataPost);
        return redirect('admin/setting/storeinfo');
    }
}
