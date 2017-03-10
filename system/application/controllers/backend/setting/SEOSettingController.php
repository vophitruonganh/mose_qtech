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

class SEOSettingController extends BackendController
{
    public function index()
    {
        return view('backend.pages.setting.SEOSetting',[
            
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'defaultPostCategory' => 'required',
            'defaultProductCategory' => 'required',
            
            'widthSizeThumbImage' => 'required|integer|min:0|max:1300',
            'heightSizeThumbImage' => 'required|integer|min:0|max:1300',
            
            'widthSizeMediumImage' => 'required|integer|min:0|max:1300',
            'heightSizeMediumImage' => 'required|integer|min:0|max:1300',
            
            'widthSizeLargerImage' => 'required|integer|min:0|max:1300',
            'heightSizeLargerImage' => 'required|integer|min:0|max:1300',
        ],[
            'defaultPostCategory.required' => 'Bạn cần chọn mặc định danh mục bài viết',
            'defaultProductCategory.required' => 'Bạn cần chọn mặc định danh mục sản phẩm',
            
            'widthSizeThumbImage.required' => 'Bạn cần nhập chiều rộng ảnh thu nhỏ',
            'widthSizeThumbImage.integer' => 'Chiều rộng ảnh thu nhỏ phải là số',
            'widthSizeThumbImage.min' => 'Chiều rộng ảnh thu nhỏ thấp nhất phải là số 0',
            'widthSizeThumbImage.max' => 'Chiều rộng ảnh thu nhỏ cao nhất phải là 1300',
            'heightSizeThumbImage.required' => 'Bạn cần nhập chiều cao ảnh thu nhỏ',
            'heightSizeThumbImage.integer' => 'Chiều cao ảnh thu nhỏ phải là số',
            'heightSizeThumbImage.min' => 'Chiều cao ảnh thu nhỏ thấp nhất phải là số 0',
            'heightSizeThumbImage.max' => 'Chiều cao ảnh thu nhỏ cao nhất phải là 1300',
            
            'widthSizeMediumImage.required' => 'Bạn cần nhập chiều rộng ảnh trung bình',
            'widthSizeMediumImage.integer' => 'Chiều rộng ảnh trung bình phải là số',
            'widthSizeMediumImage.min' => 'Chiều rộng ảnh trung bình thấp nhất phải là số 0',
            'widthSizeMediumImage.max' => 'Chiều rộng ảnh trung bình cao nhất phải là 1300',
            'heightSizeMediumImage.required' => 'Bạn cần nhập chiều cao ảnh trung bình',
            'heightSizeMediumImage.integer' => 'Chiều cao ảnh trung bình phải là số',
            'heightSizeMediumImage.min' => 'Chiều cao ảnh trung bình thấp nhất phải là số 0',
            'heightSizeMediumImage.max' => 'Chiều cao ảnh trung bình cao nhất phải là 1300',
            
            'widthSizeLargerImage.required' => 'Bạn cần nhập chiều rộng ảnh lớn',
            'widthSizeLargerImage.integer' => 'Chiều rộng ảnh lớn phải là số',
            'widthSizeLargerImage.min' => 'Chiều rộng ảnh lớn thấp nhất phải là số 0',
            'widthSizeLargerImage.max' => 'Chiều rộng ảnh lớn cao nhất phải là 1300',
            'heightSizeLargerImage.required' => 'Bạn cần nhập chiều cao ảnh lớn',
            'heightSizeLargerImage.integer' => 'Chiều cao ảnh lớn phải là số',
            'heightSizeLargerImage.min' => 'Chiều cao ảnh lớn thấp nhất phải là số 0',
            'heightSizeLargerImage.max' => 'Chiều cao ảnh lớn cao nhất phải là 1300',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/setting/website')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/
        
        /*-- Check Default Post Category --*/
        $_term = Term::where([
            'term_id' => $data['defaultPostCategory'],
            'term_type' => 'post_category',
        ])->get();
        
        if( count($_term) == 0 )
        {
            return redirect('admin/setting/website');
        }
        /*-- End Check Default Post Category --*/
        
        /*-- Check Default Product Category --*/
        $_term = Term::where([
            'term_id' => $data['defaultProductCategory'],
            'term_type' => 'product_category',
        ])->get();
        
        if( count($_term) == 0 )
        {
            return redirect('admin/setting/website');
        }
        /*-- End Check Default Post Category --*/
        
        /*-- Update Default Post Category --*/
        DB::table('qm_option')->where([
            'option_name' => 'default_post_category',
        ])->update([
            'option_value' => $data['defaultPostCategory'],
        ]);
        /*-- End Update Default Post Category --*/
        
        /*-- Update Default Product Category --*/
        DB::table('qm_option')->where([
            'option_name' => 'default_product_category',
        ])->update([
            'option_value' => $data['defaultProductCategory'],
        ]);
        /*-- End Update Default Product Category --*/
        
        /*-- Update Size Thumb Image --*/
        DB::table('qm_option')->where([
            'option_name' => 'size_thumb_image',
        ])->update([
            'option_value' => $data['widthSizeThumbImage'].'x'.$data['heightSizeThumbImage'],
        ]);
        /*-- End Update Size Thumb Image --*/
        
        /*-- Update Size Medium Image --*/
        DB::table('qm_option')->where([
            'option_name' => 'size_medium_image',
        ])->update([
            'option_value' => $data['widthSizeMediumImage'].'x'.$data['heightSizeMediumImage'],
        ]);
        /*-- End Update Size Medium Image --*/
        
        /*-- Update Size Larger Image --*/
        DB::table('qm_option')->where([
            'option_name' => 'size_larger_image',
        ])->update([
            'option_value' => $data['widthSizeLargerImage'].'x'.$data['heightSizeLargerImage'],
        ]);
        /*-- End Update Size Larger Image --*/
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'option', __FUNCTION__, "0,0,0");
        /* END SAVE DATABASE LOG */
        
        return redirect('admin/setting/website');
    }
}
