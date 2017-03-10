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

class WebsiteSettingController extends BackendController
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
        $options = [];

        $options['site_title'] = $optionObject->getOptionValue_option('site_title');
        $options['site_description'] = $optionObject->getOptionValue_option('site_description');
        $options['site_keyword'] = $optionObject->getOptionValue_option('site_keyword');
        $options['thumbnail_size_w'] = $optionObject->getOptionValue_option('thumbnail_size_w');
        $options['thumbnail_size_h'] = $optionObject->getOptionValue_option('thumbnail_size_h');
        $options['medium_size_w'] = $optionObject->getOptionValue_option('medium_size_w');
        $options['medium_size_h'] = $optionObject->getOptionValue_option('medium_size_h');
        $options['large_size_w'] = $optionObject->getOptionValue_option('large_size_w');
        $options['large_size_h'] = $optionObject->getOptionValue_option('large_size_h');
        $options['analytics'] = $optionObject->getOptionValue_option('analytics');
        $options['facebook_pixel'] = $optionObject->getOptionValue_option('facebook_pixel');
        $options['site_active'] = $optionObject->getOptionValue_option('site_active');
        $options['site_active_password'] = $optionObject->getOptionValue_option('site_active_password');
        $options['site_active_message'] = $optionObject->getOptionValue_option('site_active_message');

        return view('backend.pages.setting.websiteSetting',[
            'options' => $options,
        ]);
    }

    public function save(Request $request)
    {
        $optionObject = new Option;
        $data = $request->all();

        $data['site_active'] = isset($data['site_active']) ? 1 : 0;

        $min = 0;
        $max = 1300;
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'site_title' => 'max:70',

            'site_description' => 'max:160',

            'thumbnail_size_w' => 'integer|min:'.$min.'|max:'.$max,
            'thumbnail_size_h' => 'integer|min:'.$min.'|max:'.$max,
            
            'medium_size_w' => 'integer|min:'.$min.'|max:'.$max,
            'medium_size_h' => 'integer|min:'.$min.'|max:'.$max,
            
            'large_size_w' => 'integer|min:'.$min.'|max:'.$max,
            'large_size_h' => 'integer|min:'.$min.'|max:'.$max,

            'site_active_password' => 'min:3|max:40',
        ],[
            'thumbnail_size_w.integer' => 'Chiều rộng ảnh thu nhỏ phải là số',
            'thumbnail_size_w.min' => 'Chiều rộng ảnh thu nhỏ thấp nhất phải là số '.$min,
            'thumbnail_size_w.max' => 'Chiều rộng ảnh thu nhỏ cao nhất phải là '.$max,
            'thumbnail_size_h.integer' => 'Chiều cao ảnh thu nhỏ phải là số',
            'thumbnail_size_h.min' => 'Chiều cao ảnh thu nhỏ thấp nhất phải là số '.$min,
            'thumbnail_size_h.max' => 'Chiều cao ảnh thu nhỏ cao nhất phải là '.$max,
            
            'medium_size_w.integer' => 'Chiều rộng ảnh trung bình phải là số',
            'medium_size_w.min' => 'Chiều rộng ảnh trung bình thấp nhất phải là số '.$min,
            'medium_size_w.max' => 'Chiều rộng ảnh trung bình cao nhất phải là '.$max,
            'medium_size_h.integer' => 'Chiều cao ảnh trung bình phải là số',
            'medium_size_h.min' => 'Chiều cao ảnh trung bình thấp nhất phải là số '.$min,
            'medium_size_h.max' => 'Chiều cao ảnh trung bình cao nhất phải là '.$max,
            
            'large_size_w.integer' => 'Chiều rộng ảnh lớn phải là số',
            'large_size_w.min' => 'Chiều rộng ảnh lớn thấp nhất phải là số '.$min,
            'large_size_w.max' => 'Chiều rộng ảnh lớn cao nhất phải là '.$max,
            'large_size_h.integer' => 'Chiều cao ảnh lớn phải là số',
            'large_size_h.min' => 'Chiều cao ảnh lớn thấp nhất phải là số '.$min,
            'large_size_h.max' => 'Chiều cao ảnh lớn cao nhất phải là '.$max,

            'site_active_password.min' => 'Độ dài nhỏ nhất của mật khẩu là :min',
            'site_active_password.max' => 'Độ dài nhỏ nhất của mật khẩu là :max',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/setting/website')->withErrors($validator)->withInput();
        }

        if( strlen($data['thumbnail_size_w']) == 0 ) $data['thumbnail_size_w'] = 0;
        if( strlen($data['thumbnail_size_h']) == 0 ) $data['thumbnail_size_h'] = 0;
        if( strlen($data['medium_size_w']) == 0 ) $data['medium_size_w'] = 0;
        if( strlen($data['medium_size_h']) == 0 ) $data['medium_size_h'] = 0;
        if( strlen($data['large_size_w']) == 0 ) $data['large_size_w'] = 0;
        if( strlen($data['large_size_h']) == 0 ) $data['large_size_h'] = 0;

        

        if( $data['site_active'] == 1 && strlen($data['site_active_password']) == 0 )
        {
            $validator->getMessageBag()->add('site_active_password','Mật khẩu không được để trống');
            return redirect('admin/setting/website')->withErrors($validator)->withInput();
        }

        $optionObject->Update_option('site_title', $data['site_title']);
        $optionObject->Update_option('site_description', $data['site_description']);
        $optionObject->Update_option('site_keyword', $data['site_keyword']);
        $optionObject->Update_option('thumbnail_size_w', $data['thumbnail_size_w']);
        $optionObject->Update_option('thumbnail_size_h', $data['thumbnail_size_h']);
        $optionObject->Update_option('medium_size_w', $data['medium_size_w']);
        $optionObject->Update_option('medium_size_h', $data['medium_size_h']);
        $optionObject->Update_option('large_size_w', $data['large_size_w']);
        $optionObject->Update_option('large_size_h', $data['large_size_h']);
        $optionObject->Update_option('analytics', $data['analytics']);
        $optionObject->Update_option('facebook_pixel', $data['facebook_pixel']);
        $optionObject->Update_option('site_active', $data['site_active']);
        $optionObject->Update_option('site_active_password', $data['site_active_password']);
        $optionObject->Update_option('site_active_message', $data['site_active_message']);

        return redirect('admin/setting/website');
    }
}
