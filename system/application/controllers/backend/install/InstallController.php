<?php

namespace App\Http\Controllers\backend\install;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Provinces;
use App\Models\Districts;

/*
 * Use Library of Laravel
 */
use DB;
use Session;
use Validator;

class InstallController extends Controller
{
	public function index()
	{
		$provincesObject = new Provinces;
        $districtsObject = new Districts;
        $provinces = $provincesObject->Get_all_provinces();
        $districts = [];
        if( Session::has('province') ){
            $districts = $districtsObject->Get_districts_by_province_id(Session::get('province'));
        }
		return view('backend.pages.install.installSignup',[
			'provinces' => $provinces,
            'districts' => $districts,
		]);
	}

	public function save(Request $request)
	{
        $districtsObject = new Districts;

		$data = $request->all();

        Session::flash('province',$data['provinces']);

		/*-- Validator --*/
        $validator = Validator::make($data,[
            'selling_product_type' => 'required|in:1,2,3,4,5,6',
            'address' => 'required',
            'provinces' => 'required|not_in:choose',
            'districts' => 'required|not_in:choose',
        ],[
            'selling_product_type.required' => 'Cần phải chọn một lĩnh vực',
            'selling_product_type.in' => 'Cần phải chọn một lĩnh vực',
            'address.required' => 'Cần phải nhập địa chỉ',
            'provinces.required' => 'Cần phải chọn Tỉnh/Thành Phố',
            'provinces.not_in' => 'Cần phải chọn Tỉnh/Thành Phố',
            'districts.required' => 'Cần phải chọn Quận/Huyện',
            'districts.not_in' => 'Cần phải chọn Quận/Huyện',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/install/signup')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/

        // Check Disctrict
        $checkDistrict = $districtsObject->check_district($data['districts'],$data['provinces']);
        if( !$checkDistrict )
        {
            $validator->getMessageBag()->add('','Tỉnh thành không hợp lệ');
            return redirect('admin/install/signup')->withErrors($validator)->withInput();
        }
        // End

        $valueInArray = [
        	'website',
        	'shop',
        	'facebook',
        	'pos',
        ];

        $check = isset($data['check']) ? $data['check'] : [];
        $selling_product_type = isset($data['selling_product_type']) ? $data['selling_product_type'] : 1;
        $address = isset($data['address']) ? $data['address'] : '';
        $provinces = isset($data['provinces']) ? $data['provinces'] : '';
        $districts = isset($data['districts']) ? $data['districts'] : '';
        $simple_data = isset($data['simple_data']) ? 1 : 0;
        $expected_amount = isset($data['expected_amount']) ? $data['expected_amount'] : '1';
        $simple_data = isset($data['simple_data']) ? $data['simple_data'] : '';

        if( !is_array($check) || count($check) == 0 )
        {
            $check = [];
        	$check[] = 'website,shop';
        }

        $_check = [];
        foreach( $check as $value )
        {
            if( $value == 'website,shop' )
            {
                $_check[] = 'website';
                $_check[] = 'shop';
            }

            if( $value == 'facebook' )
            {
                $_check[] = 'facebook';
            }

            if( $value == 'pos' )
            {
                $_check[] = 'pos';
            }
        }

        if( count($_check) == 0 )
        {
            $_check[] = 'website';
            $_check[] = 'shop';
        }
        
        $check = $_check;

        $typeWeb = [];

        foreach( $check as $value )
        {
        	if( !in_array($value,$valueInArray) )
        	{
        		return redirect('admin/install/signup');
        	}

        	if( $value == 'website' )
        	{
        		$typeWeb['website'] = '';
        	}
            
            if( $value == 'shop' )
        	{
        		$typeWeb['website'] = '';
        		$typeWeb['shop'] = '';
        	}
        	
            if( $value == 'facebook' )
        	{
        		$typeWeb['shop'] = '';
        		$typeWeb['facebook'] = '';
        	}
        	
            if( $value == 'pos' )
        	{
        		$typeWeb['shop'] = '';
        		$typeWeb['pos'] = '';
        	}
        }

        $typeWeb = array_keys($typeWeb);
		/*-- Routes --*/
		
		/*-- End Routes --*/

		/*-- View --*/
		//$this->deleteDir(__DIR__.'\..\views\installUnFinish');
		/*-- End View --*/

		/*-- Controller --*/
		//unlink(__FILE__);
		/*-- End Controller --*/



		/*-- Database --*/
        // Adress
        DB::table('qm_option')->where([
            'option_name' => 'store_address',
        ])->update([
            'option_value' => $address,
        ]);
        // End

        // Province
        DB::table('qm_option')->where([
            'option_name' => 'store_province',
        ])->update([
            'option_value' => $provinces,
        ]);
        // End

        // District
        DB::table('qm_option')->where([
            'option_name' => 'store_district',
        ])->update([
            'option_value' => $districts,
        ]);
        // End

		// DB::table('qm_option')->where([
  //           'option_name' => 'active_template',
  //       ])->update([
  //           'option_value' => '',
  //       ]);

  //       DB::table('qm_option')->where([
  //           'option_name' => 'expected_amount',
  //       ])->update([
  //           'option_value' => '',
  //       ]);

		// DB::table('qm_option')->where([
  //           'option_name' => 'website_install',
  //       ])->update([
  //           'option_value' => 'finish',
  //       ]);
        
        /*-- End Database --*/
        
        $template_install = array(
        	'template' => '1',
        	'address' => $address,
        	'simple_data' => $simple_data,
        	'provinces' => $provinces,
        	'districts' => $districts,
        );
        $curl = get_curl(Domain_Action.'/template/install',$template_install);
        if($curl){
   //      	rename(__DIR__.'\..\routes\backend.php', __DIR__.'\..\routes\backend.install.php');
			// rename(__DIR__.'\..\routes\frontend.php', __DIR__.'\..\routes\frontend.install.php');
			// rename(__DIR__.'\..\routes\backend.main.php', __DIR__.'\..\routes\backend.php');
			// rename(__DIR__.'\..\routes\frontend.main.php', __DIR__.'\..\routes\frontend.php');
        }else {
        	$validator->getMessageBag()->add('','Thiết lập thất bại, vui lòng thử lại.');
            return redirect('admin/install')->withErrors($validator)->withInput();
        }

        return redirect('admin');
	}

	private function deleteDir($dirPath)
	{
		if( !is_dir($dirPath) )
		{
			if( file_exists($dirPath) !== false )
			{
				unlink($dirPath);
			}
			return;
		}

		if( $dirPath[strlen($dirPath) - 1] != '/' )
		{
			$dirPath .= '/';
		}

		$files = glob($dirPath . '*', GLOB_MARK);
		foreach( $files as $file )
		{
			if( is_dir($file) )
			{
				$this->deleteDir($file);
			}
			else
			{
				unlink($file);
			}
		}

		rmdir($dirPath);
	}
}