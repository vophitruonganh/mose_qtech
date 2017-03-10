<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\ProductController;
use Session;

class CollectionsController extends FrontendController
{

    protected $c_product = null;
    /**
     * Class Constructor
     */
    function __construct(){
        parent::__construct();
        $this->c_product = new ProductController;
    }

    public function index( Request $request){
    	return $this->c_product->index($request);
    }

    public function filter(Request $request){
    	return $this->c_product->filter('collections',$request);
    }

    public function filter_discount(Request $request){
        return $this->c_product->filter('collections/discount',$request);
    }

    public function detail($slug = '',Request $request){
    	/*Danh mục sản phẩm*/
        $check_slug = $this->m_taxonomy->Get_taxonomy_slug_type( 'product_category' , $slug);
    	if( count($check_slug)>0 ){
    		return $this->c_product->product_slug($slug,'product_category',$request);
    	}
    	/* End danh mục */

    	/*Nhãn sản phẩm*/
        $check_slug = $this->m_taxonomy->Get_taxonomy_slug_type( 'product_tag' , $slug);
    	if( count($check_slug)>0 ){
    		return $this->c_product->product_slug($slug,'product_tag',$request);
    	}
    	/* End nhãn */

    	/*Nhà cung cấp */
        $check_slug = $this->m_taxonomy->Get_taxonomy_slug_type( 'product_vendor' , $slug);
    	if( count($check_slug)>0 ){
    		return $this->c_product->product_slug($slug,'product_vendor',$request);
    	}
    	/* End nhà cung cấp */

    	/*Nhóm sản phẩm */
        $check_slug = $this->m_taxonomy->Get_taxonomy_slug_type( 'product_group' , $slug);
    	if( count($check_slug)>0 ){
    		return $this->c_product->product_slug($slug,'product_group',$request);
    	}
    	/* End nhóm sản phẩm */

    	/* chi tiết sản phâm */
    	$check_slug = $this->m_product->Get_product_slug($slug);
    	if( count($check_slug)>0 ){
    		return $this->c_product->productDetail($slug);
    	}

    	/* End  chi tiết sản phâm */

        /* Get slug like*/
        $check_slug = $this->m_taxonomy->Get_taxonomy_product_slug_like( $slug );
        if($check_slug){
            $slug = $check_slug->taxonomy_slug;
            return redirect('collections/'.$slug);
        }

        $check_slug = $this->m_product->Get_product_slug_like($slug);
        if($check_slug){
            $slug = $check_slug->product_slug;
            return redirect('collections/'.$slug);
        }

        /*End */
        return redirect('/');
    }

    public function discount(Request $request){
        return $this->c_product->product_discount($request);
    }

    public function get_variant_price(Request $request){
        $data = $request->all();
        return $this->c_product->get_variant_price();
    }
}
