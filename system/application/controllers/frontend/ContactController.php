<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\frontend\FrontendController;
/*
 * Use Library of Laravel
 */
use Session;
use DB;
use Mail;
use Validator;

class ContactController extends FrontendController
{
    function __construct(){
        parent::__construct();
    }
    public function index()
    {
        /*
        // 511 - 140
        // 511 - 141
        // 512 - 142
        // 521 - 171
        //return promotionFace(511);
        $variants = [
            [
                // Apple iPhone 5C
                // 85: Sản phẩm nổi bật
                'variant_id' => 140, // 16.000.000 x 2 = 32.000.000
                'quantity' => 2,
            ],
            [
                // Apple iPhone 5C
                // 85: Sản phẩm nổi bật
                'variant_id' => 141, // 16.900.000 x 2 = 33.800.000
                'quantity' => 2,
            ],
            [
                // Samsung Galaxy Note 4 32GB (Trắng)
                // 86: Sản phẩm xem nhiều
                'variant_id' => 142, // 9.100.000 x 2 = 18.200.000
                'quantity' => 2,
            ],
            [
                // ppp
                'variant_id' => 171, // 4.000 x 2 = 8.000
                'quantity' => 2,
            ],
                                            // total: 84.008.000
        ];
        echo '<pre>';
        print_r(promotionOrder($variants));
        exit();
        */

    	//return view('frontend/'.Session::get('template').'/pages/contact/index');
        return view('frontend/'.$this->active_template.'/pages/contact/index');
    }

    public function sendmail(request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'message' => 'required'
        ],[

            'name.required'=>'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'phone.regex'=>'Điện thoại không hợp lệ',
            'message.required' => 'Bạn chưa nhập nội dung',
        ]);

        if( $validator->fails() )
        {
            return redirect('pages/contact')->withErrors($validator)->withInput();
        }

        $dataView['name'] = $data['name'];
        $dataView['email'] = $data['email'];
        $dataView['phone'] = $data['phone'];
        $dataView['_message'] = strip_tags($data['message']);

        //Mail::send('frontend/'.Session::get('template').'/pages/contact/message',$dataView, function($message)
        Mail::send('frontend/'.$this->active_template.'/pages/contact/message',$dataView, function($message)
        {
            $message->from('ocdang85tambaytaba@gmail.com', 'Nguyễn Thân');
            $message->subject('phản hồi khách hàng');
            $message->to('ocdang85@gmail.com', 'Nguyễn Thân');
        });

        return redirect('pages/contact_success');

    }

    public function success()
    {
        //return view('frontend/'.Session::get('template').'/pages/contact/success');
        return view('frontend/'.$this->active_template.'/pages/contact/success');
    }
}
