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

class ImageSettingController extends BackendController
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
        $imageSetting = [];

        $imageSetting['sizeThumbImage'] = $optionObject->getOptionValue_option('size_thumb_image');
        $imageSetting['sizeMediumImage'] = $optionObject->getOptionValue_option('size_medium_image');
        $imageSetting['sizeLargerImage'] = $optionObject->getOptionValue_option('size_larger_image');

        return view('backend.pages.setting.imageSetting',[
            'imageSetting' => $imageSetting,
        ]);
    }

    public function save(Request $request)
    {
        $optionObject = new Option;
        $data = $request->all();

        $min = 0;
        $max = 1300;
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'widthSizeThumbImage' => 'required|integer|min:'.$min.'|max:'.$max,
            'heightSizeThumbImage' => 'required|integer|min:'.$min.'|max:'.$max,
            
            'widthSizeMediumImage' => 'required|integer|min:'.$min.'|max:'.$max,
            'heightSizeMediumImage' => 'required|integer|min:'.$min.'|max:'.$max,
            
            'widthSizeLargerImage' => 'required|integer|min:'.$min.'|max:'.$max,
            'heightSizeLargerImage' => 'required|integer|min:'.$min.'|max:'.$max,
        ],[
            'widthSizeThumbImage.required' => 'Bạn cần nhập chiều rộng ảnh thu nhỏ',
            'widthSizeThumbImage.integer' => 'Chiều rộng ảnh thu nhỏ phải là số',
            'widthSizeThumbImage.min' => 'Chiều rộng ảnh thu nhỏ thấp nhất phải là số '.$min,
            'widthSizeThumbImage.max' => 'Chiều rộng ảnh thu nhỏ cao nhất phải là '.$max,
            'heightSizeThumbImage.required' => 'Bạn cần nhập chiều cao ảnh thu nhỏ',
            'heightSizeThumbImage.integer' => 'Chiều cao ảnh thu nhỏ phải là số',
            'heightSizeThumbImage.min' => 'Chiều cao ảnh thu nhỏ thấp nhất phải là số '.$min,
            'heightSizeThumbImage.max' => 'Chiều cao ảnh thu nhỏ cao nhất phải là '.$max,
            
            'widthSizeMediumImage.required' => 'Bạn cần nhập chiều rộng ảnh trung bình',
            'widthSizeMediumImage.integer' => 'Chiều rộng ảnh trung bình phải là số',
            'widthSizeMediumImage.min' => 'Chiều rộng ảnh trung bình thấp nhất phải là số '.$min,
            'widthSizeMediumImage.max' => 'Chiều rộng ảnh trung bình cao nhất phải là '.$max,
            'heightSizeMediumImage.required' => 'Bạn cần nhập chiều cao ảnh trung bình',
            'heightSizeMediumImage.integer' => 'Chiều cao ảnh trung bình phải là số',
            'heightSizeMediumImage.min' => 'Chiều cao ảnh trung bình thấp nhất phải là số '.$min,
            'heightSizeMediumImage.max' => 'Chiều cao ảnh trung bình cao nhất phải là '.$max,
            
            'widthSizeLargerImage.required' => 'Bạn cần nhập chiều rộng ảnh lớn',
            'widthSizeLargerImage.integer' => 'Chiều rộng ảnh lớn phải là số',
            'widthSizeLargerImage.min' => 'Chiều rộng ảnh lớn thấp nhất phải là số '.$min,
            'widthSizeLargerImage.max' => 'Chiều rộng ảnh lớn cao nhất phải là '.$max,
            'heightSizeLargerImage.required' => 'Bạn cần nhập chiều cao ảnh lớn',
            'heightSizeLargerImage.integer' => 'Chiều cao ảnh lớn phải là số',
            'heightSizeLargerImage.min' => 'Chiều cao ảnh lớn thấp nhất phải là số '.$min,
            'heightSizeLargerImage.max' => 'Chiều cao ảnh lớn cao nhất phải là '.$max,
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/setting/image')->withErrors($validator)->withInput();
        }

        // Update Size Thumb Image
        $optionObject->Update_option('size_thumb_image',$data['widthSizeThumbImage'].'x'.$data['heightSizeThumbImage']);
        
        // Update Size Medium Image
        $optionObject->Update_option('size_medium_image',$data['widthSizeMediumImage'].'x'.$data['heightSizeMediumImage']);
        
        // Update Size Larger Image
        $optionObject->Update_option('size_larger_image',$data['widthSizeLargerImage'].'x'.$data['heightSizeLargerImage']);

        return redirect('admin/setting/image');
    }
}
