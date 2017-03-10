<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\frontend\FrontendController;
use Session;
class HomeController extends FrontendController
{

	/**
	 * Class Constructor
	 */
	function __construct(){
        parent::__construct();
	}

    public function index(){
    	$product_new = get_product_tax_limit( '', '', 12 );
    	$get_product_by_group = get_product_tax_limit( 'product_group', 'san-pham-noi-bat', 6 );
    	return view('frontend.'.$this->active_template.'.pages.home.home',[
    		//'product_new' => $product_new,
    		//'get_product_by_group' => $get_product_by_group,
    	]);
    }
}
