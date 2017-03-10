<?php

namespace App\Http\Controllers\backend\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;

use Validator;
use DB;
use Session;

class CheckoutSettingController extends BackendController
{

    /*
    *    updateCustomerAccount: cập nhật tài khoản khách hàng
    *    
    *    
    */
    public function index()
    {
        $option = new Option;
        $_option_checkout_setting = $option->Get_option_value('checkout_setting');

        return view('backend.pages.setting.checkout.checkoutSetting',[
            'option_checkout_setting' => $_option_checkout_setting
        ]);
    }
    /* 
        cập nhật tài khoản khách hàng
    */
    public function updateCustomerAccount(Request $request)
    {
        $data = $request->all();
        $option = new Option;
        $checkoutAccoutType = isset($data['checkoutAccoutType']) ? $data['checkoutAccoutType'] : 1;
        $array_checkout_setting= [1,2,3];

        if( !in_array($checkoutAccoutType,$array_checkout_setting) )
        {
           $checkoutAccoutType = 1;
        }
        $option->Update_option('checkout_setting',$checkoutAccoutType);
        return redirect('admin/setting/checkout');
    }
    
}
