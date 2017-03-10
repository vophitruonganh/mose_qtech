<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\attachment\AttachmentController;
use Validator;
use Session;
use DB;
use App\Libraries\FacebookLibrary\Facebook;
use App\Libraries\FacebookLibrary\FacebookApiException;

class ProductController extends BackendController
{
    function __construct(){
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = $request->all();
        $search = isset($data['search']) ? $data['search'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $product_status = isset($data['product_status']) ? $data['product_status'] : 'all';
        $type = isset($data['type']) ? $data['type'] : '';
        $sortBy = isset($data['sortBy']) ? $data['sortBy'] : 'created-desc';
        $category = isset($data['category']) ? $data['category'] : '';
        $arr_product_status = ['all','public','pending','draft','trash'];
        $arr_select_action = ['trash','edit','restore','delete'];
        //Check sortBy
        $arr_sortBy = ['created-asc','created-desc'];
        if(!in_array($sortBy, $arr_sortBy)){
            $sortBy = 'created-desc';
        }
        /*kiểm tra kiểu request*/
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }

        //Đếm tình trạng sản phẩm
        $product_count = [];
        $product_count['all']= $this->m_product->Count_product_status('all');
        $product_count['public'] = $this->m_product->Count_product_status('public');
        $product_count['pending'] = $this->m_product->Count_product_status('pending');
        $product_count['trash'] = $this->m_product->Count_product_status('trash');
        $product_count['draft'] = $this->m_product->Count_product_status('draft');

        if($type_request == 'ajax')
        {
            if(!in_array($product_status, $arr_product_status))
                return '{"Response":"False","Redirect":"'.url('admin/product').'"}';
            if(!in_array($select_action, $arr_select_action) && $select_action)
                return '{"Response":"False","Redirect":"'.url('admin/product').'"}';
            if( $type =='action' ){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/product/edit/'.$check[0]));
                    return $output;
                }else if($select_action == 'trash' && $count){
                    $this->product -> Action_product($check, 'trash');
                }else if($select_action == 'restore' && $count){
                    $this->product -> Action_product($check, 'restore');
                }else if($select_action == 'delete' && $count){
                    $this->product -> Action_product($check, 'delete');
                }
            }
            //$products = $this->productActionSearch($search, $product_status, $sortBy);
            $products = $this->m_product_relationships -> Get_product_search($product_status, $search, $category);
            $data_view = array();
            $data_view['select_action'] = $select_action;
            $data_view['search']    = $search;
            $data_view['product_status'] = $product_status;
            $data_view['product_count']     = $product_count;
            $data_view['sortBy']    =   $sortBy;

            return $this->productView($products,$data_view);

        }else{
            if(!in_array($product_status, $arr_product_status))
                return redirect('admin/product');
            if($select_action)
            {
                $count = count($check);
                if($select_action == 'edit' && $count){
                    return redirect('admin/product/edit/'.$check[0]);
                }else if($select_action == 'trash' && $count){
                    $this->product -> Action_product($check, 'trash');
                }else if($select_action == 'restore' && $count){
                    $this->product -> Action_product($check, 'restore');
                }else if($select_action == 'delete' && $count){
                    $this->product -> Action_product($check, 'delete');
                }
            }
            $product_page = [];
            $product_page ['product_status'] = $product_status ;
            $product_page ['sortBy'] = $sortBy ;
            if($search){
                $product_page ['search'] = $search ;
            }
            if($category){
                $product_page ['category'] = $category ;
            }
            //$products = $this->productActionSearch($search, $product_status, $sortBy);
            $products = $this->m_product_relationships -> Get_product_search($product_status, $search, $category);
            return view('backend.pages.store.product.listProduct',[
            'products'         => $products,
            'product_status'   => $product_status,
            'product_count'    => $product_count,
            'search'        => $search,
            'sortBy'        => $sortBy,
            'pagination'    => $product_page,
        ]);

        }

    }

    private function productView($products , $data_view = array()){
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.store.product.listViewProduct',[
                'products'         => $products,
                'product_count'         => $data_view['product_count'],
                'search'        => $data_view['search'],
                'product_status'   => $data_view['product_status'],
                'sortBy'        => $data_view['sortBy']
            ]);
        $objdata['Page'] = urlencode($products->render());

        if($data_view['search']){
            $objdata['Page'] = urlencode($products->appends(array('search' => $data_view['search'],'product_status' => $data_view['product_status']))->render());
        }else {
            $objdata['Page'] = urlencode($products->appends(array('product_status' => $data_view['product_status']))->render());
        }
        $objdata['List'] = urlencode($view);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'trash'){
            $objdata['Message'] = 'Xóa sản phẩm thành công!';
        }
        if($data_view['select_action'] == 'delete'){
            $objdata['Message'] = 'sản phẩm đã được xóa vĩnh viễn!';
        }
        if($data_view['select_action'] == 'restore'){
            $objdata['Message'] = 'Khôi phục sản phẩm thành công!';
        }
        return $objdata;
    }

    private function productActionSearch( $search = '', $product_status = 'all', $sortBy = 'created-desc')
    {
         $arr_product_status = ['public', 'pending' ,'trash' , 'draft'] ;
         if($sortBy == 'created-asc'){
            $sortBy = 'ASC';
         }else{
            $sortBy = 'DESC';
         }
         if(in_array($product_status, $arr_product_status))
         {
            return $this->m_product->Search_product($product_status,$search,$sortBy);
         }
        return $this->m_product->Search_product('',$search,$sortBy);

    }
	public function create()
    {
        /*-- Data Seo --*/
        $seoData = [];
            /*-- Seo Title --*/
        $seoData['title'] = $this->m_option->getOptionValue_option('site_title');
            /*-- End Seo Title --*/

            /*-- Seo Url --*/
        $seoData['url'] = $this->m_option->getOptionValue_option('site_url');
            /*-- End Seo Url --*/

        /*-- End Data Seo --*/

        $prefixSlug = $seoData['url'];

        $product_groups = $this->m_taxonomy -> Search_taxonomy_title_limit('product_group','',100);
        $category_products = $this->m_taxonomy -> Get_taxonomy_type('product_category');
        $product_tags = $this->m_taxonomy -> Get_taxonomy_type('product_tag');
        $product_vendors = $this->m_taxonomy -> Get_taxonomy_type('product_vendor','',100);

        return view('backend.pages.store.product.createProduct',[
			'product_groups' => $product_groups,
            'category_products' => $category_products,
            'product_tags' => $product_tags,
            'product_vendors' => $product_vendors,
            'seoData' => $seoData,
            'prefixSlug' => $prefixSlug,
        ]);
    }


    /*
    *  Store
    *
    *  This function will insert product and variant
    *
    *  @type    function
    *  @date    31/10/2016
    *  @since   1.0.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public function store(Request $request){
    	$data = $request->all();
        $variant_option = isset($data['variant_option']) ? $data['variant_option'] : [];
        $variant_option_name = isset($data['variant_option_name']) ? $data['variant_option_name'] : [];
        $array_variant_otion = [];

        /*Tao mang check*/
        // $value_slug = [];
        // foreach($variant_option as $value){
        //     $value = str_slug($value);
        //     array_push($value_slug, $value);
        // }

        // return $array_variant_otion;
        /*end*/
        /* Tạo mảng variant_option loại bỏ option trùng nhau*/

        foreach ($variant_option as $key => $value) {
            if(!$this->in_arrayi($value,$array_variant_otion)){
                array_push($array_variant_otion, $value);
            }
            else{
                if($key!=0){
                    unset($variant_option_name[$key]);
                }
            }
        }
        $variant_option = $array_variant_otion;
        $variant_option_name = array_values($variant_option_name);

        $array1 = isset($variant_option_name[0])? explode(',', $variant_option_name[0]):[];
        $array2 = isset($variant_option_name[1])? explode(',', $variant_option_name[1]):[];
        $array3 = isset($variant_option_name[2])? explode(',', $variant_option_name[2]):[];
        $length_variant = $this->getVariantLength($array1,$array2,$array3);

        // unset($data['variant_item'][0]);
        // $variant_new=array_values($data['variant_item']);
        // return $variant_new;
        // return $this->getVariantLength($array1,$array2,$array3);
        // return $variant_option_name;

        $data_productmeta=[];
        $datavariant=[];

        $validator = Validator::make($data,[
            'title'=>'required',
        ],[
            'title.required'=>'Chưa nhập tiêu đề',
        ]);

        if( $validator->fails()){
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }else{
                return redirect('admin/product/create')->withErrors($validator)->withInput();
            }
        }

        /*Check variant*/
        $variant_option_name = isset($data['variant_option_name']) ? $data['variant_option_name'] : [] ;
        if(!count($variant_option_name)){
            $validator->getMessageBag()->add('','Sản phẩm cần có ít nhất 1 phiên bản');
            if($request->ajax()){
                return '{"Response":"False","Message":"Sản phẩm cần có ít nhất 1 phiên bản"}';
            }else{
                return redirect('admin/product/create')->withErrors($validator)->withInput();
            }
        }
        /*End check variant*/

        /*Kiểm tra tiêu đề phiên bản*/
        foreach($variant_option_name as $name){
            if(!$name){
                $validator->getMessageBag()->add('','Tên hoặc giá trị thuộc tính không được rỗng');
                if($request->ajax()){
                    return '{"Response":"False","Message":"Tên hoặc giá trị thuộc tính không được rỗng"}';
                }else{
                    return redirect('admin/product/create')->withErrors($validator)->withInput();
                }
            }
        }
        /*End kiểm tra*/

        /*Kiểm tra giá phiên bản*/
        $variant_item = isset($data['variant_item']) ? $data['variant_item'] : [];
        //Kiểm tra check ít nhất 1 variant_item
        $check_variant = 0;
        foreach ($variant_item as $item) {
            if(isset($item['id'])){
                $check_variant +=1;
                $datavariant['price_new']=$item['price'];
                if(!$item['price']){
                    $validator->getMessageBag()->add('','Phiên bản cần phải nhập giá');
                    if($request->ajax()){
                        return '{"Response":"False","Message":"Phiên bản cần phải nhập giá"}';
                    }else{
                        return redirect('admin/product/create')->withErrors($validator)->withInput();
                    }
                }
            }
            if(!$check_variant){
                $validator->getMessageBag()->add('','Sản phẩm cần chọn ít nhất một phiên bản');
                if($request->ajax()){
                    return '{"Response":"False","Message":"Sản phẩm cần chọn ít nhất một phiên bản"}';
                }else{
                    return redirect('admin/product/create')->withErrors($validator)->withInput();
                }
            }
        }
        /*End kiểm tra*/

        // Post List Image
        $product_image = isset($data['product_image']) ? $data['product_image'] : [];
        if( count($variant_option_name)  )
        {
            foreach($product_image as $value)
            {
                $value = intval($value);

                $attachment = $this->m_attachment->get_attachment_post($value);
                if( count($attachment) == 0 )
                {
                    $value = '';
                }
            }
        }
        // End
        $title = isset($data['title'])? strip_tags(trim($data['title'])): '';
        $slug = isset($data['slug']) ? strip_tags(trim($data['slug'])) : '';
        $content = isset($data['content']) ? $data['content'] : '';
        $excerpt = isset($data['excerpt']) ? get_excerpt($data['excerpt']) : '';
        $product_status = isset($data['product_status'])? $data['product_status']: 'public';
        $comment_status = isset($data['product_comment'])? $data['product_comment']: 'public';
        $arrayproductStatus = ['public','trash','draft'];
        if( !in_array($product_status,$arrayproductStatus)){
            $product_status = 'public';
        }

        $arrayCommentStatus = ['yes','no'];
        if( !in_array($comment_status,$arrayCommentStatus) )
        {
           $comment_status = 'yes';
        }

        /*-- Check Slug --*/
        //-----------------/
        if($slug){
            $slug = str_slug_product('create',$slug);
        }else {
            if(strlen($title)==0){
               $slug = str_slug_product('create','no title');
            }else{
               $slug = str_slug_product('create',$title);
            }
        }
        /*-- End Check Slug --*/
        /*Xu ly thoi gian*/
        $product_date =isset($data['product_date']) ? $data['product_date'] : date('H:i d/m/Y',time()) ;
        $arr_product_date = explode(" ",$product_date );
        $arr_day = explode("/", $arr_product_date[1]);
        $product_date = strtotime(date("$arr_day[2]/$arr_day[1]/$arr_day[0] $arr_product_date[0]"));
        /*End */
        $dataproduct['product_title'] =$title ;
        $dataproduct['product_slug'] = $slug;
        $dataproduct['user_id'] = Session::get('user_id');
        $dataproduct['product_date'] = $product_date;
        $dataproduct['product_modified'] = $product_date;
        $dataproduct['product_content'] = $content;
        $dataproduct['product_excerpt'] = $excerpt;
        $dataproduct['product_status'] = $product_status;
        $dataproduct['product_image'] = encode_serialize($product_image);
        $dataproduct['comment_status'] = $comment_status;
        $product_id = $this->m_product->Insert_product($dataproduct);


        /*Check Variant*/
        $price_old = isset($data['price_old']) ? str_replace( ',', '', $data['price_old'] ) : 0;
        $tracking = isset($data['tracking']) ? $data['tracking'] : 0;
        $arraytracking = ['notracking' => 0,'tracking' => 1];
        $quantity_limit = isset($data['quantity_limit']) ? 1 : 0;
        $product_quantity = isset($data['product_quantity']) ? $data['product_quantity'] : 0;
        $product_weight = isset($data['product_weight']) ? $data['product_weight'] : 0;
        $product_ship = isset($data['product_ship']) ? 1 : 0;
        $image = count($product_image)? $product_image[0] : '';
        $variant_option = isset($data['variant_option']) ? $data['variant_option'] : [];
        $variant_option_name = isset($data['variant_option_name']) ? $data['variant_option_name'] : [];
        if( !array_key_exists($tracking, $arraytracking)){
            $tracking = 0;
        }
        else{
           $tracking = $arraytracking[$tracking];
        }
        $product_quantity = $tracking == 1 ? $product_quantity : 0;

        /*End variant*/

        //variant
        $datavariant['product_id'] = $product_id;
        $datavariant['price_old']=$price_old;
        $datavariant['tracking_policy'] = $tracking;
        $datavariant['out_of_stock'] = $quantity_limit;
        $datavariant['quantity'] = $product_quantity;
        $datavariant['inventory'] = $product_quantity;
        $datavariant['weight'] = $product_weight;
        $datavariant['ship'] = $product_ship;
        $datavariant['image'] = $image;
        // $variant_id= $this->m_variant->Insert_variant($datavariant);
        $variant_id = [];
         foreach ($variant_item as $item) {
            if(isset($item['id'])){
                $datavariant['price_new']=str_replace( ',', '', $item['price']);
                $datavariant['sku']=$item['sku'];
                $datavariant['barcode']=$item['barcode'];
                $datavariant['quantity']=$item['quantity'];
                $variant_id [] .= $this->m_variant->Insert_variant($datavariant);

                // $this->insertVariantOption($variant_id ,$variant_option ,$option1,$option2,$option3 );
            }
        }
        if($variant_id){
            $this->insertVariantOption($variant_id,$variant_option,$variant_option_name);
        }

		/*Danh muc san pham*/
        $product_category = isset($data['product_category']) ? $data['product_category'] : [];
        if($product_category){
            foreach($product_category as $cat){
                $check_category  = $this->m_taxonomy->Get_taxonomy_id('product_category',$cat);
                if($check_category){
                    //Thêm mới
                    $this->m_product_relationships-> Insert_product_relationships( $cat, $product_id );
                    //Đếm sản phẩm của danh mục
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $cat);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($cat, $count);
                }
            }
        }else{
            //chọn danh mục mặc định
            $category_default = $this->m_option->getOptionValue_option('default_product_category');
            //Thêm mới
            $this->m_product_relationships-> Insert_product_relationships( $category_default, $product_id );
            //Đếm sản phẩm của danh mục
            $count = $this->m_product_relationships-> Count_product_relationships_term( $category_default);
            //Cập nhật count
            $this->m_taxonomy -> Update_taxonomy_count($category_default, $count);
        }
        /*End */

        //Nhom san pham
        $product_group = isset($data['product_group']) ? $data['product_group']: [];
        if($product_group){
            foreach($product_group as $group){
                $check_group  = $this->m_taxonomy->Get_taxonomy_id('product_group',$group);
                if($check_group){
                    //Thêm mới
                    $this->m_product_relationships-> Insert_product_relationships( $group, $product_id );
                    //Đếm sản phẩm của danh mục
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $group);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($group, $count);
                }
            }
        }
        //End nhóm

        //nhà cung cấp
        $product_vendor = isset($data['product_vendor']) ? $data['product_vendor']: '';
        if($product_vendor)
        {
            foreach($product_vendor as $vender){
                 $check_vendor  = $this->m_taxonomy->Get_taxonomy_id('product_vendor',$vender);
                 if( $check_vendor ){
                    //Thêm mới
                    $this->m_product_relationships-> Insert_product_relationships( $vender, $product_id );
                    //Đếm sản phẩm của nhoms
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $vender);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($vender, $count);
                }
            }
        }

        //product tag san pham
        $data['newtags'] = trim($data['newtags']);
        if(strlen($data['newtags'])>0){
            $newtags = explode(",", $data['newtags']);
            foreach($newtags as $newtag){
                $newtag = strip_tags(trim($newtag));
                $check_tag = $this->m_taxonomy -> Get_taxonomy_name( 'product_tag', $newtag )->first();
                if($check_tag){
                    $this->m_product_relationships-> Insert_product_relationships( $check_tag->taxonomy_id, $product_id );
                    //Đếm sản phẩm của nhoms
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $check_tag->taxonomy_id);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($check_tag->taxonomy_id, $count);

                }
                else{
                    //$term = new Term;
                    $taxonomy_arr = [] ;
                    $taxonomy_arr['taxonomy_name'] = $newtag;
                    $taxonomy_arr['taxonomy_slug'] = taxonomy_slug_create('product_tag', $newtag);
                    $taxonomy_arr['taxonomy_type'] = 'product_tag';
                    $taxonomy_id = $this->m_taxonomy->Insert_taxonomy($taxonomy_arr);

                    //thêm vào term_meta
                    $meta_value = [];
                    $meta_value['excerpt'] = '';
                    $meta_value['seo_title'] = '';
                    $meta_value['seo_excerpt'] = '';
                    $meta_value['seo_keyword'] = '';
                    $value = encode_serialize($meta_value);
                    $this->m_taxonomy_meta-> Insert_tax_meta($taxonomy_id, 'product_tag_data', $value);
                    //thêm vào relationships
                    $this->m_product_relationships-> Insert_product_relationships( $taxonomy_id, $product_id );
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $taxonomy_id);
                    $this->m_taxonomy -> Update_taxonomy_count($taxonomy_id, $count);
                }
            }
        }

        //end tag
        $seo_title = isset($data['seo_title']) ? strip_tags(trim($data['seo_title'])) : '';
        $seo_description = isset($data['seo_description']) ? strip_tags(trim($data['seo_description'])) : '';
        $seo_keyword = isset($data['seo_keyword']) ? strip_tags(trim($data['seo_keyword'])) : '';
        $data_productmeta['seo_title']= $seo_title;
        $data_productmeta['seo_description']= $seo_description;
        $data_productmeta['seo_keyword']= $seo_keyword;
        $this->m_product_meta->Insert_product_meta($product_id, 'product_data', encode_serialize($data_productmeta));


        if($request->ajax()){
            return '{"Response":"True","Redirect":"'.url('admin/product/edit/'.$product_id).'"}';
        }else {
            return redirect('admin/product/edit/'.$product_id);
        }
    }
    public function edit($product_id)
    {

        $product = $this->m_product-> Get_product_id( $product_id );

        //danh sách các phiên bản của sản phẩm
		$variants = $this->m_variant-> Get_variant_id_order_by( $product_id );

        //các thuộc tính của phiên bản
        $variant_att_list = $this->m_variant->Get_variant_meta_list($product_id);
        $array=[];
        foreach ($variant_att_list as $variant_att) {
            $variant_value = $this->m_variant->Get_variant_meta_value($product_id,$variant_att->variant_name);
            $array[$variant_att->variant_name]=$variant_value;

        }
        // return $array;
        $count_variant = count($variants);

        //list variant name và value của phiên bản
        $variant_meta_arr = [];
        $variant_array = $this->list_variant($product_id);

        foreach ($variants as $variant) {
            $variant_meta_list=$this->m_variant_meta-> Get_variant_meta_id($this->m_variant->variant_id);
            array_push($variant_meta_arr,$variant_meta_list);
        }

        //END list variant name và value của phiên bản
        // return $att_variant[0];
        //get image variant
        $image_variant_value = [];
        foreach($variants as $key => $value){
            if( count($value) > 0 ){
                if( !filter_var($value, FILTER_VALIDATE_URL) ){
                    $query = $this->m_attachment -> get_attachment_post( $value->image);
                    if( $query != null ){
                        $image_variant_value[] = $query->attachment_url;;
                    }
                }
                else{
                    if( @getimagesize($value) != false ){
                        $image_variant_value[] = $value->image;
                    }
                }
            }
        }
        //END image variant

        $array_title_table=[];
       // $array_title_default=['Mã sản phẩm','Giá','Số lượng'];
        foreach ($variant_att_list as $variant_extra) {
            array_push($array_title_table, $variant_extra->variant_name);
        }

        $product_group = $this->m_product_relationships->Get_product_relationships_list($product_id,'product_group')->toArray();

        $list_taxonomy_select = $this->m_taxonomy->Get_taxonomy_type_with_id('product_group',$product_group);
        $list_taxonomy_not_select = $this->m_taxonomy->Get_taxonomy_type_with_not_id('product_group',$product_group);

        $product_group_lists = array_merge($list_taxonomy_select->toArray(),$list_taxonomy_not_select->toArray());
        // return $product_group_lists;

        $category_products = $this->m_taxonomy -> Get_taxonomy_type('product_category');

        $product_vendor = $this->m_product_relationships->Get_product_relationships_list($product_id,'product_vendor')->toArray();
        $list_taxonomy_select = $this->m_taxonomy->Get_taxonomy_type_with_id('product_vendor',$product_vendor);
        $list_taxonomy_not_select = $this->m_taxonomy->Get_taxonomy_type_with_not_id('product_vendor',$product_vendor);

        $product_vendor_lists = array_merge($list_taxonomy_select->toArray(),$list_taxonomy_not_select->toArray());

        $product_category = json_decode($this->m_product_relationships->Get_product_relationships_list($product_id,'product_category'));
        $product_tags = $this->m_product_relationships -> Get_product_relationships($product_id ,'product_tag');

        $tag_name = '';
         if($product_tags)
        {
            foreach($product_tags as $product_tag)
            {
                $tag_name.=$product_tag->taxonomy_name.',';
            }
        }

        if( count($product) == 0 )
        {
            return redirect('admin/product');
        }
        $product_meta= $this->m_product_meta ->Get_product_meta($product_id ) ;


        // Get Post List Image
        // $postListImage = [];
        // $postListImageValue = [];
        // $checkMetaKey = $this->m_product_meta->Get_meta_key_and_id($product_id,'post_list_image');

        // if( count($checkMetaKey) == 1 )
        // {
        //     $temPostListImage = $this->m_product_meta->Get_product_meta_key($product_id,'post_list_image');

        //     foreach($temPostListImage as $key => $value)
        //     {
        //         if( strlen($value) > 0 )
        //         {
        //             if( !filter_var($value, FILTER_VALIDATE_URL) )
        //             {
        //                 $query = $this->m_attachment -> get_attachment_post( $value  );
        //                 if( $query != null )
        //                 {
        //                     $postListImage[] = $query->attachment_url;
        //                     $postListImageValue[] = $value;
        //                 }
        //             }
        //             else
        //             {
        //                 if( @getimagesize($value) != false )
        //                 {
        //                     $postListImage[] = $value;
        //                     $postListImageValue[] = $value;
        //                 }
        //             }
        //         }
        //     }

        //     $this->m_product_meta->Update_product_meta($product_id,'post_list_image',encode_serialize($postListImageValue));
        // }
        // code tren khong con su dung duoc nua
        $productImage = [];
        $productImage = decode_serialize($product->product_image);
        // foreach($temPostListImage as $key => $value)
        // {
        //     if( strlen($value) > 0 )
        //     {
        //         if( !filter_var($value, FILTER_VALIDATE_URL) )
        //         {
        //             $query = $this->m_attachment -> get_attachment_post( $value  );
        //             if( $query != null )
        //             {
        //                 $postListImage[] = $query->attachment_url;
        //                 $postListImageValue[] = $value;
        //             }
        //         }
        //         else
        //         {
        //             if( @getimagesize($value) != false )
        //             {
        //                 $postListImage[] = $value;
        //                 $postListImageValue[] = $value;
        //             }
        //         }
        //     }
        // }

        // End
        $prefixSlug = $this->m_option->getOptionValue_option('site_url');
        return view('backend.pages.store.product.editProduct',[
            'post'=>$product,
            'variant_array'=>$variant_array,
            'array_title_table'=>$array_title_table,
            'tag_name'=>$tag_name,
            'product_group_lists' => $product_group_lists,
            'product_group' => $product_group,
            'category_products' => $category_products,
            'product_category'=>$product_category,
            'product_vendor_lists' => $product_vendor_lists,
            'product_vendor' => $product_vendor,
            'product_tags'=>$product_tags,
            'productImage' => $productImage,
            'prefixSlug' => $prefixSlug,

        ]);
    }
    /*
        Cập nhật product
    */
    public function update($product_id,Request $request)
    {
        $dataUpdate=array();
        $data=$request->all();
        $data_productmeta=[];

        $validator = Validator::make($data,[
            'title'=>'required',
            // 'product_code'=>'required',
            // 'price_old'=>'required|numeric',
            // 'price_new'=>'required|numeric',
        ],[
           'title.required'=>'Chưa nhập tiêu đề',
            // 'product_code.required'=>'Chưa nhập mã sản phẩm',
            // 'price_old.required'=>'Chưa nhập giá cũ',
            // 'price_old.numeric' => 'Giá phải là số',
            // 'price_new.required'=>'Chưa nhập giá mới',
            // 'price_new.numeric' => 'Giá phải là số'

        ]);
        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
            else{
                return redirect('admin/product/edit/'.$product_id)->withErrors($validator)->withInput();
            }
        }

        // Post List Image
        $postListImage = isset($data['product_image']) ? $data['product_image'] : [];

        if( !is_array($postListImage) ){
            return redirect('admin/product');
        }

        if( count($postListImage) > 0 ){
            foreach($postListImage as $value){
                $value = intval($value);
                $attachment = $this->m_attachment->get_attachment_post($value);
                if( count($attachment) == 0 ){
                    return redirect('admin/product');
                }
            }
        }
        // End


        $title = isset($data['title']) ? strip_tags(trim($data['title'])) : '';
        $slug = isset($data['slug']) ? $data['slug'] : '';
        $content = isset($data['content']) ? $data['content'] : '';
        $excerpt = isset($data['excerpt']) ? strip_tags($data['excerpt']) : '';
        $product_status = isset($data['product_status']) ? $data['product_status'] : '';
        $product_comment = isset($data['product_comment']) ? $data['product_comment'] : '';
        $get_slug = $this->product -> Get_product_id($product_id)->value('product_slug');

        if($slug != $get_slug){
            if($slug){
                $slug = str_slug_product('update',$slug,$product_id);
            }else {
                if(strlen($title)==0){
                    $slug = str_slug_product('update','no title',$product_id);
                }else{
                   $slug = str_slug_product('update',$title,$product_id);
                }
            }
        }else {
            $slug = $get_slug;
        }

        /* End slug */
        $dataUpdate['user_id']=Session::get('user_id');
        //xử lý thời gian
        $time=time();
        $dataUpdate['product_modified']=$time;
        //xử lý input
        $dataUpdate['product_title'] = $title;
        $dataUpdate['product_slug'] = $slug;
        $dataUpdate['product_content'] = $content;
        $dataUpdate['product_excerpt'] = $excerpt;

        $arrayproductStatus = [
            'public',
            'trash',
            'draft',
        ];

        if(!in_array($product_status,$arrayproductStatus)){
            $product_status = 'public';
        }

        $dataUpdate['product_status']=$product_status;
        // $dataUpdate['product_parent']='0';
        $dataUpdate['product_image'] = encode_serialize($postListImage);

        $arrayCommentStatus = [
            'yes',
            'no',
        ];
        if( !in_array($product_comment,$arrayCommentStatus) ){
            $product_comment = 'yes';
        }

        $dataUpdate['comment_status']=$product_comment;
        $dataUpdate['product_date']=$this->m_product->Get_product_id($product_id)->product_date;
        $dataUpdate['product_id']=$product_id;
        $this->m_product->Update_product($dataUpdate);

        $list_variant = $this->list_variant($product_id);
        foreach ($list_variant as $value) {
            if(!in_array($value['image'], $postListImage)){
                $this->m_variant->Update_variant_image($product_id,$value['variant_id'],'');
            }
        }
		//product FACEBOOK
        if($data['product_status'] == 'public' && Session::has('user_id_facebook')){
            $facebook        = new Facebook(['appId' => '1136963499687042', 'secret' => '4abbfdcc36e14b6247e5f8247c5bf50f']);

            $param = array(
                "message"       => $data['title'],
                "picture"       => 'http://i.telegraph.co.uk/multimedia/archive/03589/Wellcome_Image_Awa_3589699k.jpg',
                "link"          => url('product-detail/'.$data["slug"] . '.html'),
                "name"          => $data['title'],
                "description"   => empty($data['excerpt']) ? 'Day la san pham '.$data['title'] : $data['excerpt'],
            );

            try {
                $producted = $facebook->api('/'.Session::get('user_id_facebook').'/feed/', 'product', $param);
            } catch (FacebookApiException $e) {
                $errMsg = $e->getMessage();
            }
        }
        //END product LEN FACEBOOK

		//Lay danh sach term cu
        $lists = $this->m_product_relationships->Get_product_relationships( $product_id );
        //xóa list cũ
        $this->m_product_relationships->Delete_product_relationships_product( $product_id );
        //Cập nhật count list cũ
        foreach( $lists as $list){
            $count = $this->m_product_relationships -> Count_product_relationships_term( $list->taxonomy_id );
            $this->m_taxonomy -> Update_taxonomy_count( $list->taxonomy_id,$count );
        }

        //Danh mục
        $product_category = isset($data['product_category']) ? $data['product_category']: [];
        if($product_category){
            $p_cat_arr = $product_category;
            foreach($p_cat_arr as $p_cat){
                //Kiểm tra hợp lệ product_category
                $check_category  = $this->m_taxonomy->Get_taxonomy_id('product_category',$p_cat);
                if($check_category){
                    //Thêm mới
                    $this->m_product_relationships-> Insert_product_relationships( $p_cat, $product_id );
                    //Đếm sản phẩm của danh mục
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $p_cat);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($p_cat, $count);
                }
            }
        }else{
            //Nếu ko chọn category nào thì sẽ cho vào category mặc định
            $category_default = $this->m_option->getOptionValue_option('default_product_category');
            //Thêm mới
            $this->m_product_relationships-> Insert_product_relationships( $category_default, $product_id );
            //Đếm sản phẩm của danh mục
            $count = $this->m_product_relationships-> Count_product_relationships_term( $category_default);
            //Cập nhật count
            $this->m_taxonomy -> Update_taxonomy_count($category_default, $count);
        }

        //End danh mục

        //nhom san pham
        $product_group = isset($data['product_group']) ? $data['product_group']: [];
        if($product_group){
            $p_group_arr = $product_group;
            foreach($p_group_arr as $p_group){
                //Kiểm tra hợp lệ product_category
                $check_group  = $this->m_taxonomy->Get_taxonomy_id('product_group', $p_group);
                if($check_group){
                    //Thêm mới
                    $this->m_product_relationships-> Insert_product_relationships( $p_group, $product_id );
                    //Đếm sản phẩm của nhoms
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $p_group);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($p_group, $count);
                }
            }
        }
        //End nhóm


        //nhà cung cấp
        $product_vendor = isset($data['product_vendor']) ? $data['product_vendor']: '';
        if($product_vendor)
        {
            $product_vendors = $product_vendor;
            foreach ($product_vendors as $product_vendor) {
                //Kiểm tra hợp lệ product_vendor
                $check_vendor  = $this->m_taxonomy->Get_taxonomy_id('product_vendor',$product_vendor);
                if( $check_vendor ){
                    //Thêm mới
                    $this->m_product_relationships-> Insert_product_relationships( $product_vendor, $product_id );
                    //Đếm sản phẩm của nhoms
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $product_vendor);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($product_vendor, $count);
                }
            }
        }

        //Thêm tag
        //Trước khi thêm lại phải xóa tag, đã xử lý trên category
        $newtags = isset($data['newtags']) ? trim($data['newtags']): '';

        if(strlen($newtags)>0){
            $newtags = explode(",", $newtags);
            foreach($newtags as $newtag){
                $newtag = strip_tags(trim($newtag));
                $check_tag = $this->m_taxonomy -> Get_taxonomy_name( 'product_tag', $newtag )->first();
                if($check_tag){
                    $this->m_product_relationships-> Insert_product_relationships( $check_tag->taxonomy_id, $product_id );
                    //Đếm sản phẩm của nhoms
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $check_tag->taxonomy_id);
                    //Cập nhật count
                    $this->m_taxonomy -> Update_taxonomy_count($check_tag->taxonomy_id, $count);
                }
                else{
                    //$term = new Term;
                    $taxonomy_arr = [] ;
                    $taxonomy_arr['taxonomy_name'] = $newtag;
                    $taxonomy_arr['taxonomy_slug'] = taxonomy_slug_create('product_tag', $newtag);
                    $taxonomy_arr['taxonomy_type'] = 'product_tag';
                    $term_id = $this->m_taxonomy->Insert_taxonomy($taxonomy_arr);

                    //thêm vào term_meta
                    $meta_value = [];
                    $meta_value['excerpt'] = '';
                    $meta_value['seo_title'] = '';
                    $meta_value['seo_excerpt'] = '';
                    $meta_value['seo_keyword'] = '';
                    $value = encode_serialize($meta_value);
                    $this->m_taxonomy_meta-> Insert_tax_meta($term_id, 'product_tag_data', $value);
                    //thêm vào relationships
                    $this->m_product_relationships-> Insert_product_relationships( $term_id, $product_id );
                    $count = $this->m_product_relationships-> Count_product_relationships_term( $term_id);
                    $this->m_taxonomy -> Update_taxonomy_count($term_id, $count);
                }
            }
        }

        //end tag


        $seo_title = isset($data['seo_title']) ? strip_tags(trim($data['seo_title'])): '';
        $seo_description = isset($data['seo_description']) ? strip_tags(trim($data['seo_description'])): '';
        $seo_keyword = isset($data['seo_keyword']) ? $data['seo_keyword']: '';
        $data_productmeta['seo_title']=$seo_title;
        $data_productmeta['seo_description']=$seo_description;
        $data_productmeta['seo_keyword']=$seo_keyword;
		$this->m_product_meta->Update_product_meta($product_id, 'product_data', encode_serialize($data_productmeta));

		/*
         * ADD DATABASE LOG
         */
       // addTableLog("App\Models\Logs", Session::get('user_id'), 'product', __FUNCTION__, "$product_id,0,0");
        /* END SAVE DATABASE LOG */

        if($request->ajax()){
            return '{"Response":"True","Redirect":"'.url('admin/product/edit/'.$product_id).'"}';
        }else {
            return redirect('admin/product/edit/'.$product_id);
        }
        // return redirect('admin/product');
    }

    public function destroy($product_id)
    {
        $product = $_product -> Get_product_id($product_id);
        if( count($product) == 0 ){
            return redirect('admin/product');
        }
        $_product -> Delete_product($product_id);
        return redirect('admin/product');
    }

    /*
    *  Search Taxonomy
    *
    *  This function will get and search taxonomy of product
    *
    *  @type    function
    *  @date    31/10/2016
    *  @since   1.0.0
    *
    *  @param   array, array, array
    *  @return  N/A
    */
    public function searchTaxonomy(){
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
        $taxonomy_id = isset($_REQUEST['taxonomy_id']) ? $_REQUEST['taxonomy_id'] : '';
        if($search==''){
            // $array=explode(',',$taxonomy_id);
            $list_taxonomy_select = $this->m_taxonomy->Get_taxonomy_type_with_id($type,$taxonomy_id);
            $list_taxonomy_not_select = $this->m_taxonomy->Get_taxonomy_type_with_not_id($type,$taxonomy_id);
            return array_merge($list_taxonomy_select->toArray(),$list_taxonomy_not_select->toArray());
        }
        return $this->m_taxonomy->Search_taxonomy_title_limit($type,$search,100);
    }

    /*
    *  Get Variant Length
    *
    *  This function will get length variant option
    *
    *  @type    function
    *  @date    31/10/2016
    *  @since   1.0.0
    *
    *  @param   array, array, array
    *  @return  N/A
    */
    private function getVariantLength($array1 =array(),$array2 =array(),$array3 =array()){
        if(!count($array1) && !count($array2) && !count($array3)){
            return 0;
        }else {
            $count_1 = count($array1) ? count($array1) : 1;
            $count_2 = count($array2) ? count($array2) : 1;
            $count_3 = count($array3) ? count($array3) : 1;
            return $count_1 * $count_2 * $count_3;
        }
    }

    /*
    *  Insert Variant Option
    *
    *  This function will insert variant option
    *
    *  @type    function
    *  @date    31/10/2016
    *  @since   1.0.0
    *
    *  @param   array, array, array
    *  @return  N/A
    */
    private function insertVariantOption($variant_id = array(),$option_name = array(),$option_item = array()){
        $option1 = isset($option_item[0])? $option_item[0] : '';
        $option2 = isset($option_item[1])? $option_item[1] : '';
        $option3 = isset($option_item[2])? $option_item[2] : '';
        // return count($option3);

        if($option1){
            $option1 = explode(',', $option1);
        }else {
            $option1 = [];
        }
        if($option2){
            $option2 = explode(',', $option2);
        }else {
            $option2 = [];
        }
        if($option3){
            $option3 = explode(',', $option3);
        }else {
            $option3 = [];
        }

        $option_arr=[];

        if(count($option3) && !count($option2)&& !count($option1)){
            foreach ($option3 as $value3) {
                array_push($option_arr, [$value3]);
            }
        }elseif(count($option3) && count($option2) && !count($option1)){
            foreach ($option2 as $value2) {
                foreach ($option3 as $value3) {
                    array_push($option_arr, [$value2,$value3]);
                }
            }
        }elseif(count($option3) && count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                foreach ($option2 as $value2) {
                    foreach ($option3 as $value3) {
                        array_push($option_arr, [$value1,$value2,$value3]);
                    }
                }
            }
        }elseif(count($option3) && !count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                foreach ($option3 as $value3) {
                    array_push($option_arr, [$value1,$value3]);
                }
            }
        }elseif(!count($option3) && count($option2) && !count($option1)){
            foreach ($option2 as $value2) {
                array_push($option_arr, [$value2]);
            }
        }elseif(!count($option3) && count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                foreach ($option2 as $value2) {
                    array_push($option_arr, [$value1,$value2]);
                }
            }
        }elseif(!count($option3) && !count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                array_push($option_arr, [$value1]);
            }
        }

        $option_num = 0; $option_order = 1;
        foreach ($option_arr as $option) {
            $item_num = 0; $item_order = 1;
            foreach ($option_name as $name) {
                if(isset($option[$item_num])){
                    if(isset($variant_id[$option_num])){
                        $this->m_variant_meta->Insert_variant_meta($variant_id[$option_num],$name,$option[$item_num],$item_order);
                    }
                }
                $item_num++; $item_order++;
            }
            if(isset($variant_id[$option_num])){
                $this->m_variant_meta->Insert_variant_meta($variant_id[$option_num],'option_order',$option_order);
            }
            $option_num++;
            $option_order++;
        }
    }
    /*
        List variant of product
    */
    private function list_variant($product_id = 0){
        $variant_array = [];
        $variants = $this->m_variant->Get_variant_id_order_by( $product_id );
        foreach ($variants as $variant) {
            $variant_item=$this->m_variant_meta-> Get_variant_meta_id($this->m_variant->variant_id);
            $option1 = isset($variant_item[0])? $variant_item[0] : [];
            $option2 = isset($variant_item[1])? $variant_item[1] : [];
            $option3 = isset($variant_item[2])? $variant_item[2] : [];
            array_push($variant_array,[
                'variant_id'=>$this->m_variant->variant_id,
                'variant_sku'=>$this->m_variant->sku,
                'variant_price_old'=>$this->m_variant->price_old,
                'variant_price'=>$this->m_variant->price_new,
                'weight'=>$this->m_variant->weight,
                'barcode'=>$this->m_variant->barcode,
                'tracking_policy'=>$this->m_variant->tracking_policy,
                'out_of_stock'=>$this->m_variant->out_of_stock,
                'variant_quantity'=>$this->m_variant->quantity,
                'inventory'=>$this->m_variant->inventory,
                'ship'=>$this->m_variant->ship,
                'image'=>$this->m_variant->image,
                'option1'=>$option1,
                'option2'=>$option2,
                'option3'=>$option3
            ]);
        }
        return $variant_array;

    }
    private function in_arrayi($str,$array=array()){
        if(in_array(strtolower($str), array_map('strtolower', $array))){
            return 1;
        }
        return 0;
    }
}