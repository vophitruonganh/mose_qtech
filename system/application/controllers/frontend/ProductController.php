<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Requests;

/*
 * Use Library of Laravel
 */
use Session;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class ProductController extends FrontendController
{
    /**
     * Class Constructor
     */
    function __construct(){
        parent::__construct();
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
    public function index(Request $request)
    {
        $pageNo = $request->input('page',1);
        $title_name = 'Tất cả sản phẩm';
        $search = '';
        $page_url = 'product';
        $product_arr = [];

        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
            $title_name = 'Kết quả tìm kiếm';
            $page_url = 'search_product';
        }
        $view = isset($_GET['view']) ? $_GET['view'] : '';
        $sortBy = isset($_GET["sortBy"]) ? $_GET["sortBy"] : '';

        $products = $this->m_product->Get_product_frontend($search, $sortBy);
        $product_arr = $this->get_discount($products);
        if($sortBy){
            $product_arr = $this->get_sortBy($product_arr, $sortBy);
        }

        $dataView = [];
        $dataView['view']  = $view;
        $dataView['search'] = $search;
        $dataView['title_name'] = $title_name;
        return $this -> productView($request,$product_arr,$page_url,$dataView);

    }

    public function product_slug($taxonomy_slug='', $taxonomy_type = 'product_category' , Request $request)
    {

        $pageNo = $request->input('page',1);
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $view = isset($_GET['view']) ? $_GET['view'] : '';
        $sortBy = isset($_GET["sortBy"]) ? $_GET["sortBy"] : '';

        $slug_name = $this->taxonomy->Get_taxonomy_name_slug( $taxonomy_type, $taxonomy_slug);
        $products = $this->m_product->Get_product_frontend($search, $sortBy,$taxonomy_type , $taxonomy_slug);
        $product_arr = $this->get_discount($products);
        if($sortBy){
            $product_arr = $this->get_sortBy($product_arr, $sortBy);
        }

        $dataView = [];
        $dataView['view']  = $view;
        $dataView['search'] = $search;
        $dataView['title_name'] = $slug_name;
        $dataView['slug']  = $taxonomy_slug;
        return $this -> productView($request,$product_arr,'product_slug',$dataView);

    }

     public function product_discount($request)
    {
        $m_product = new Product;
        $pageNo = $request->input('page',1);
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $view = isset($_GET['view']) ? $_GET['view'] : '';
        $sortBy = isset($_GET["sortBy"]) ? $_GET["sortBy"] : '';
        $slug_name = 'Sản Phẩm Khuyến Mãi' ;
        $products = $this->m_product->Get_product_frontend($search, $sortBy);
        $product_arr = $this->get_discount($products,'1');
        if($sortBy){
            $product_arr = $this->get_sortBy($product_arr, $sortBy);
        }
        $dataView = [];
        $dataView['view']  = $view;
        $dataView['search'] = $search;
        $dataView['title_name'] = $slug_name;
        $dataView['slug']  = 'discount';
        return $this -> productView($request,$product_arr,'product_slug',$dataView);

    }

    private function get_discount($products = array(), $get_product_discount = '')
    {
        $product_arr = [];
        if($products){
            foreach($products as $product){
                /*Lấy variant đầu*/
                $variant   = $this->m_variant->Get_variant_option_order_product_detail( $product->product_id );
                $variant_first = $this->get_first_variant_id($variant);
                $variant_id = $variant_first['variant_id'];
                $variant_image = $variant_first['variant_image'];
                /*End */
                $meta = $this->m_variant->Get_variant_id($variant_id);
                $arr = [];
                $get_discount = promotionFace( $product->product_id, $variant_id );
                $arr['product_id'] = $product->product_id;
				$arr['product_code'] =  $meta->sku;
                $arr['product_title'] = $product->product_title;
                $arr['product_excerpt'] = !empty($product->product_excerpt) ? get_excerpt($product->product_excerpt,30) : get_excerpt($product->product_content,30);
                $arr['product_slug'] = $product->product_slug;
                $arr['product_date'] = $product->product_date;
                $arr['product_image_id'] = $variant_image;
                /*dùng để kiểm tra cho đặt hàng khi hết hàng*/
                $arr['out_of_stock'] = $meta->out_of_stock;
                $arr['quantity'] = $meta->quantity ;
                /* end */
                $arr['price_new'] = $get_discount['price_new'];
                $arr['percentage'] = $get_discount['percentage'];
                $arr['price_old'] = $get_discount['price_old'];
                $arr['price_new'] = $get_discount['price_new'];
                $arr['check_discount'] = $get_discount['check_discount'];
                //Chỉ lấy sản phẩm khuyến mãi
                if($get_product_discount){
                    if($get_discount['check_discount']){
                        array_push($product_arr,$arr);
                    }
                }
                //Lấy tất cả sản phẩm
                else{
                    array_push($product_arr,$arr);
                }

            }
        }
        return $product_arr;
    }

    private function get_sortBy($arrPosts = array(), $sortBy = 'price-asc')
    {
            //giá tăng dần
            if($sortBy=="price-asc"){
                usort($arrPosts, function($a,$b){
                    return strnatcmp($a['price_new'],$b['price_new']);
                });
            }
            //giá tăng dần
            if($sortBy=="price-desc"){
                usort($arrPosts, function($a,$b){
                    return strnatcmp($b['price_new'],$a['price_new']);
                });
            }
            //sản phẩm mới nhất
            if($sortBy=="created-desc"){
                usort($arrPosts, function($a,$b){
                    return $b['product_date'] - $a['product_date'];
                });
            }
            //sản phẩm cũ nhất
            if($sortBy=="created-asc"){
                usort($arrPosts, function($a,$b){
                    return $a['product_date'] - $b['product_date'];
                });
            }
            return $arrPosts;
    }

    private function productView($request,$arrPosts = array(),$page_url='product', $dataView = array())
    {
        $pageNo = $request->input('page',1);
        $view           = isset($dataView['view']) ? $dataView : '';
        $title_name     = isset($dataView['title_name']) ? $dataView['title_name'] : 'Tất cả sản phẩm';
        $search          = isset($dataView['search']) ? $dataView['search'] : '';
        $slug           = isset($dataView['slug']) ? $dataView['slug'] : '';
        if(isset($_GET["view"])){
            //load danh sách dạng lưới
            if($request->input('view')=='grid'){
                $products = $this->paginate($arrPosts, 12,$pageNo);

                //return view('frontend/'.Session::get('template').'/pages/'.$page_url.'/grid',
                return view('frontend/'.$this->active_template.'/pages/'.$page_url.'/grid',
                [
                    'products'     => $products->appends($request->input()),
                    'title_name' => $title_name,
                    'search'     => $search,
                    'slug'      => $slug
                ]
                );
            }
            //load danh sách dạng list
            if($request->input('view')=='list'){
                $products = $this->paginate($arrPosts, 6,$pageNo);

                //return view('frontend/'.Session::get('template').'/pages/'.$page_url.'/list',
                return view('frontend/'.$this->active_template.'/pages/'.$page_url.'/list',
                [
                    'products' => $products->appends($request->input()),
                    'title_name' => $title_name,
                    'search'     => $search,
                    'slug'      => $slug

                ]
                );
            }
        }
        $products = $this->paginate($arrPosts, 12,$pageNo);
        //return view('frontend/'.Session::get('template').'/pages/'.$page_url.'/grid',
        return view('frontend/'.$this->active_template.'/pages/'.$page_url.'/grid',
            [
                'products' => $products->appends($request->input()),
                'title_name' => $title_name,
                'search'     => $search,
                'slug'      => $slug
            ]
        );
    }

    private function get_first_variant_id( $variants = array())
    {
        $min = 9999;
        $arr = [];
        $arr['variant_id'] = '';
        $arr['variant_image'] = '';
        foreach($variants as $v){
            $variant_value = isset($v->variant_value) ? $v->variant_value: 9999;
            if($variant_value < $min){
                $min = $v->variant_value;
                $arr['variant_id'] = $v->variant_id;
                $arr['variant_image'] = $v->image;
            }
        }
        return $arr;
    }


    // public function filter($productView,Request $request)
    // {
    // 	$data = $request->all();
    //     $arrayFilter = ["default", "alpha-asc", "alpha-desc", "price-asc", "price-desc", "created-desc", "created-asc"];
    // 	//kiểm tra giá trị sortBy
    //     if( !in_array($data['sortBy'],$arrayFilter) )
    //     {
    //         return redirect('/'.$productView.'.html');
    //     }
    // 	if(isset($data["sortBy"])){
    // 		if(isset($data["view"])){
    //             if(isset($data['search']))
    //             {
    //                 return redirect('/'.$productView.'?view='.$data["view"].'&sortBy='.$data["sortBy"].'&search='.$data['search']);
    //             }
    // 			return redirect('/'.$productView.'?view='.$data["view"].'&sortBy='.$data["sortBy"]);
    // 		}
    // 		else{
    //             if(isset($data['search']))
    //             {
    //                 return redirect('/'.$productView.'?sortBy='.$data["sortBy"].'&search='.$data['search']);
    //             }
    // 			return redirect('/'.$productView.'?sortBy='.$data["sortBy"]);
    // 		}
    // 	}
    // }


   public function productDetail($product_slug)
   {
        $product = $this->m_product-> Get_product_detail_frontend( $product_slug );
        if(!$product){
            return redirect('/');
        }
        //Lấy variant đầu tiên theo order_option
        $variant_first   = Get_first_variant_id_product( 'product_id', $product->product_id);
        //$variant_first = $this->get_first_variant_id($variant);
        $variant_id = $variant_first['variant_id'];
        $variant_image = $variant_first['variant_image'];
        /* end */

        //Lấy giá khuyến mãi sản phẩm
        $get_discount               = promotionFace( $product->product_id,$variant_id );
        //Lấy các va
        $list_variant_meta_value    = $this->m_variant_meta->  Get_list_variant_value_first( $variant_id)->toArray();
        $list_variant_id            = $this->m_variant-> Get_list_variant_id_product_detatil($product->product_id);
        $list_variant_name          = $this->m_variant->Get_variant_name_product_detai($product->product_id);
        $product_arr = [];
        $product_arr['product_id']      = $product->product_id ;
        $product_arr['product_code']    =  $variant_first['sku'];
        $product_arr['product_title']   = $product->product_title ;
        $product_arr['product_slug']    = $product->product_slug ;
        $product_arr['product_excerpt'] = !empty($product->product_excerpt) ? get_excerpt($product->product_excerpt,30) : get_excerpt($product->product_content,30) ;
        $product_arr['product_content'] = $product->product_content ;
        $product_arr['product_image']   = $product->product_image ;
        $product_arr['comment_status']  = $product->comment_status ;
        $product_arr['price_new']       = $get_discount['price_new'] ;
        $product_arr['price_old']       = $get_discount['price_old'] ;
        $product_arr['product_image_id'] = $variant_image ;
        return view('frontend.'.$this->active_template.'.pages.product_detail.detail',[
            'product'           => $product_arr,
            'list_variant_name' => $list_variant_name,
            'list_variant_id' => $list_variant_id,
            'list_variant_meta_value' => $list_variant_meta_value

        ]);
    }

    //Lay gia san pham khi thay doi thuoc tinh
    public function variant_detail($product_id = '', $variant_id= '')
    {
        $variant = $this->m_variant->Get_price_variant_product_detail( $product_id, $variant_id);
        $variant_arr = [];
        $get_discount = promotionFace( $product_id, $variant_id);

        $variant_arr['out_of_stock'] = $variant->out_of_stock;
        $variant_arr['quantity'] = $variant->quantity;
        $variant_arr['image'] = get_image_url($variant->image);
        $variant_arr['price_new'] = number_format($get_discount['price_new'],0,'.','.').'đ' ;
        $variant_arr['price_old'] = !empty($get_discount['price_old']) ? number_format($get_discount['price_old'],0,'.','.').'đ' : '';
        $variant_arr['variant_id'] = $variant_id;
        return json_encode($variant_arr);
    }

    public function get_variant_price(Request $request)
    {
         $data = $request->all();
         $variant_meta  = $data['variant_meta'];
         $product_id    = $data['product_id'];
         $sql = "Select qm_variant_meta.variant_id from qm_variant_meta, qm_variant
                          where qm_variant_meta.variant_id = qm_variant.variant_id AND qm_variant.product_id = $product_id
                          and qm_variant_meta.variant_name <> 'option_order'
                ";
         foreach( $variant_meta as $key => $value){
            $sql.= "AND  qm_variant_meta.variant_id IN (
                    select variant_id
                    from qm_variant_meta
                    where variant_name = '$key' and variant_value = '$value'
            )";
         }
         $sql.= "group by qm_variant_meta.variant_id";
         $variant_id_arr =  DB::select(DB::raw($sql));
         if(!$variant_id_arr){
            return 0;
         }
         return $this->variant_detail($product_id,$variant_id_arr[0]->variant_id);

    }
}
