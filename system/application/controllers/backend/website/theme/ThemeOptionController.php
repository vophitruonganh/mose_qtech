<?php

namespace App\Http\Controllers\backend\website\theme;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use Validator;
use DB;

class ThemeOptionController extends BackendController
{
	public $templateActived;

	public function __construct()
    {
    	parent::__construct();
    	
    	$optionObject = new Option;

		$templateActived = $optionObject->getOptionValue_option('active_template');

		$this->templateActived = $templateActived;

		require_once('system/application/views/frontend/'.$this->templateActived.'/function.php');
        if( !function_exists('themeOption') || !function_exists('registerOption') )
        {
            return redirect('admin')->send();
        }
    }

	public function index()
	{
		$optionObject = new Option;
		$optionValue = decode_serialize($optionObject->getOptionValue_option($this->templateActived.'_theme_option'));

		return view('frontend.'.$this->templateActived.'.pages.theme.option',[
			'optionValue' => $optionValue,
		]);
	}

	public function save(Request $request)
	{
		$optionObject = new Option;
		$data = $request->all();

		require_once('system/application/views/frontend/'.$this->templateActived.'/function.php');
		$dataOption = themeOption($data);
		
		/*-- Update Theme Option --*/
        $optionObject->update_option($this->templateActived.'_theme_option',encode_serialize($dataOption));
        /*-- End Update Active Template --*/

		return redirect('admin/template/option');
	}
}