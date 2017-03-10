<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
/*
 * Use Library of Laravel
 */
use Session;
//====================== REUQIURE CONFIGS ==========================
use App\App\Config\InfoStores;
//====================== REUQIURE MODEL ==========================
use App\Models\Option;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\User;
use App\Models\Usermeta;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Term;
use App\Models\TermMeta;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\TaxonomyRelationships;
use App\Models\TaxonomyMeta;
use App\Models\OrderRelationships;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\ProductRelationships;
use App\Models\Variant;
use App\Models\VariantMeta;
use App\Models\ProductTemp;
use App\Models\Shipping;
use App\Models\Statistic;
use App\Models\Attachment;
//====================== REUQIURE lIBARIES ==========================
//===================================================================
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class BackendController extends Controller
{
    //public $options;
    public $option_load;

    public function __construct(){
        $this->m_option = new Option;
        $this->m_order = new Order;
        $this->m_order_meta = new OrderMeta;
        $this->m_user = new User;
        $this->m_user_meta = new Usermeta;
        $this->m_provinces = new Provinces;
        $this->m_districts = new Districts;
        $this->m_term = new Term;
        $this->m_term_meta = new TermMeta;
        $this->m_post = new Post;
        $this->m_taxonomy = new Taxonomy;
        $this->m_taxonomy_relationships = new TaxonomyRelationships;
        $this->m_taxonomy_meta = new TaxonomyMeta;
        $this->m_meta = new TaxonomyMeta;
        $this->m_order_relationships = new OrderRelationships;
        $this->m_customer = new Customer;
        $this->m_product = new Product;
        $this->m_product_meta = new ProductMeta;
        $this->m_product_relationships = new ProductRelationships;
        $this->m_variant = new Variant;
        $this->m_variant_meta = new VariantMeta;
        $this->m_product_temp = new ProductTemp;
        $this->m_shipping = new Shipping;
        $this->m_statistic = new Statistic;
        $this->m_attachment = new Attachment;

        parent::__construct();
        // Option Load
        $this->option_load = optionLoad();
        view()->share('option_load',$this->option_load);
        // End

        // Load đếm đơn hàng
        $count_order = $this->m_order->Count_order_new();
        view()->share('sum_order_new', $count_order);
        // End đơn hàng

        /*-- Hidden Menu If Template haven't resgister_navigation() --*/
        $hiddenMenu = true;
        $active_template = $this->m_option->getOptionValue_option('active_template');
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        if( function_exists('resgister_navigation') )
        {
            $hiddenMenu = false;
        }
        view()->share('hiddenMenu',$hiddenMenu);
        view()->share('setion_heading', '');
        /*-- End Hidden Menu If Template haven't resgister_navigation() --*/
    }

    public function paginate($items,$perPage,$pageStart=1)
    {
        //offset: vị trí bắt đầu cắt trong mảng
        //perPage: số lượng phần tử mỗi trang
        $offSet = ($pageStart * $perPage) - $perPage;

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);
        return new LengthAwarePaginator($itemsForCurrentPage, count($items),
        $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }
}
