<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//============================ BACKEND ============================
// use App\Models\User;
// use App\Models\Usermeta;
// use App\Models\Order;
// use App\Models\OrderMeta;
// use App\Models\OrderRelationships;
// use App\Models\Customer;
// use App\Models\Product;
// use App\Models\Variant;
// use App\Models\VariantMeta;
// use App\Models\ProductTemp;
// use App\Models\Provinces;
// use App\Models\Districts;
// use App\Models\Shipping;
// use App\Models\Option;
// use App\Models\Post;
// use App\Models\Attachment;
// use App\Models\Statistic;
//============================ FRONTEND ============================

class Controller extends BaseController
{

	//============================ BACKEND VARIABLE ============================
	// protected $m_option = null;
 //    protected $m_attachment = null;
 //    protected $m_order = null;
 //    protected $m_user = null;
 //    protected $m_usermeta = null;
 //    protected $m_customer = null;
 //    protected $m_product = null;
 //    protected $m_product_temp = null;
 //    protected $m_post = null;
 //    protected $m_order_relationship = null;
 //    protected $m_variant = null;
 //    protected $m_variant_meta = null;
 //    protected $m_province = null;
 //    protected $m_district = null;
 //    protected $m_shipping = null;
 //    protected $m_statistic = null;
    //============================ FRONTEND VARIABLE ============================
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
    	//============================ BACKEND ============================
	    // $this->m_option = new Option;
	    // $this->m_attachment = new Attachment;
	    // $this->m_order = new Order;
	    // $this->m_user = new User;
	    // $this->m_usermeta = new Usermeta;
	    // $this->m_customer = new Customer;
	    // $this->m_product = new Product;
	    // $this->m_product_temp = new ProductTemp;
	    // $this->m_post = new Post;
	    // $this->m_order_relationship = new OrderRelationships;
	    // $this->m_variant = new Variant;
	    // $this->m_variant_meta = new VariantMeta;
	    // $this->m_province = new Provinces;
	    // $this->m_district = new Districts;
	    // $this->m_shipping = new Shipping;
	    // $this->m_statistic = new Statistic;
	    //============================ FRONTEND ============================
        //============================ PARAMS ============================

    }




}
