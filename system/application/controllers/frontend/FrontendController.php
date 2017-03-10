<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Route;
//====================== REUQIURE SERVICE PROVIDER ==========================

//====================== REUQIURE CONFIGS ==========================
//====================== REUQIURE CONTROLLERS ==========================
use App\Http\Controllers\Controller;

// use App\Http\Controllers\frontend\PostController;
//======================= REUQIURE MODEL ===========================
use App\Models\Customer;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\OrderRelationships;
use App\Models\Product;
use App\Models\ProductTemp;
use App\Models\Variant;
use App\Models\VariantMeta;
use App\Models\Option;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Taxonomy;
use App\Models\Post;
use App\Models\TaxonomyRelationships;
//====================== REUQIURE lIBARIES ==========================
use App\Libraries\ClientIP\RemoteAddress;
use App\Libraries\Uploads;
//===================================================================

class FrontendController extends Controller
{
        protected $m_option = null;
        protected $m_order = null;
        protected $m_order_relationship = null;
        protected $m_usermeta = null;
        protected $m_customer = null;
        protected $m_product = null;
        protected $m_product_temp = null;
        protected $m_variant = null;
        protected $m_variant_meta = null;
        protected $m_province = null;
        protected $m_district = null;
        protected $m_taxonomy = null;
        protected $m_post = null;
        protected $active_template = null;
        protected $c_post = null;

        function __construct()
        {
            parent::__construct();

            //================== NEW OBJECT MODEL ==================
            $this->m_option = new Option;
            $this->m_order = new Order ;
            $this->m_order_relationship = new OrderRelationships;
            $this->m_usermeta = new UserMeta;
            $this->m_customer = new Customer;
            $this->m_product = new Product;
            $this->m_product_temp = new ProductTemp;
            $this->m_variant = new Variant;
            $this->m_variant_meta = new VariantMeta;
            $this->m_provinces = new Provinces;
            $this->m_districts = new Districts;
            $this->m_taxonomy = new Taxonomy;
            $this->m_post = new Post;
            $this->m_taxonomy_relationships = new TaxonomyRelationships;
            // // ===================== NEW OBJECT CONTROLLER ==================
            // $this->c_post = new PostController;
            // ===================== GET VALUES DEFAULT ==================
            $this->active_template = $this->m_option->getOptionValue_option('active_template');
            // dd($this->active_template);
            $this->date_using_website();
            /*-- Get Theme Option --*/
            $this->getThemeOption();
            /*-- Get Store Setting --*/
            $this->getStoreSetting();
            /*-- End Get Store Setting --*/

        }

    private function date_using_website(){
        $date_expiration_website = $this->m_option->where(['option_name' => 'expiration_date_website',])->first()->option_value;
        if(count($date_expiration_website)>0 && $date_expiration_website<= time()){
            $domain = $_SERVER['HTTP_HOST'];
            header("Location: http://$domain/error.php");
            exit();
        }
    }

    private function getThemeOption()
    {
        $this->active_template = $this->m_option->getOptionValue_option('active_template');
        Session::put('template',$this->active_template);


        require_once('system/application/views/frontend/'.$this->active_template.'/function.php');
        if( function_exists('registerOption') )
        {
            $registerOption = registerOption();

            $optionValue = decode_serialize($this->m_option->where([
                'option_name' => $this->active_template.'_theme_option',
            ])->first()->option_value);

            foreach( $registerOption as $option ){
                if( isset($optionValue[$option]) ){
                    view()->share($option,$optionValue[$option]);
                }
            }
        }
    }
    private function getStoreSetting()
    {
        $storeSetting = [];
        $storeSetting['telephone'] = $this->m_option->where('option_name','telephone')->first()->option_value;
        $storeSetting['address'] = $this->m_option->where('option_name','address')->first()->option_value;
        $storeSetting['email'] = $this->m_option->where('option_name','email')->first()->option_value;
        view()->share('storeSetting',$storeSetting);
    }
}
