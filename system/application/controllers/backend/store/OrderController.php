<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\backend\BackendController;
use View;

use Validator;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends BackendController{

    public function paginate($items,$perPage,$pageStart=1){
        //offset: vị trí bắt đầu cắt trong mảng
        //perPage: số lượng phần tử mỗi trang
        $offSet = ($pageStart * $perPage) - $perPage;

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);
        return new LengthAwarePaginator($itemsForCurrentPage, count($items),
        $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }

	public function index(Request $request){
        $order_prefix=$this->m_option->getOptionValue_option('order_prefix');
        $order_suffix=$this->m_option->getOptionValue_option('order_suffix');
        $data = $request->all();

        // return $_GET["order_status"];
        $pageNo = $request->input('page',1);
        $customer_id = isset($data['customer_id']) ? $data['customer_id'] : 0;
        $check = isset($data['check']) ? $data['check'] : [];
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $order_status = isset($data['order_status']) ? $data['order_status'] : 'all';
        $type = isset($data['type']) ? $data['type'] : '';
        $search = strip_tags(trim(isset($data['search']) ? $data['search'] : ''));

        $arr_order_status = ['all','0', '1','2','3','4','5'] ;
        $arr_select_action = ['edit', 'trash', 'restore', 'delete'] ;

        /*kiểm tra kiểu request*/
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }

        $order_count = [];
        $order_count['all']= $this->m_order->Count_order_status('all');
        $order_count['paid'] = $this->m_order->Count_order_status('0');
        $order_count['pending'] = $this->m_order->Count_order_status(1);
        $order_count['trash'] = $this->m_order->Count_order_status(2);
        $order_count['draft'] = $this->m_order->Count_order_status(3);
        $order_count['part_refund'] = $this->m_order->Count_order_status(4);
        $order_count['full_refund'] = $this->m_order->Count_order_status(5);

        dd($order_count);
        /* Lấy dữ liệu từ DB*/
        $order_arr = [];
        $order_arr['customer_id'] = $customer_id ;
        $order_arr['order_status'] = $order_status;
        $ordercodes = $this->m_order-> Search_order($search, $order_arr);

        //Danh sách hóa đơn
        $arrOrder=[];//mảng lưu thông tin các hóa đơn
        if(count($ordercodes)>0){
            foreach ($ordercodes as $data) {
                //chi tiết hóa đơn
                $orders = $this->m_order->Get_order_detail($data->order_code);
                $arr=array(
                    'order_id' => $data->order_id,
                    'order_code' => $data->order_code,
                    'order_date' => $data->date_create,
                    'customer_id' => $data->customer_id,
                    'customer_fullname' => $data->customer_fullname,
                    'amount_payment' => $data->amount_payment,
                    'amount_order' => $data->amount_order,
                    'order_status' => $data->order_status,
                );
                array_push($arrOrder,$arr);
            }
        }

        /* End lấy dữ liệu từ DB*/
        if( $type_request == 'ajax' ){

            if(!in_array($order_status, $arr_order_status)){
                return '{"Response":"False","Redirect":"'.url('admin/order').'"}';
            }
            if(!in_array($select_action, $arr_select_action) && $select_action ){
                return '{"Response":"False","Redirect":"'.url('admin/order').'"}';
            }
            if($type = 'action'){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/order/edit/'.$check[0]));
                    return $output;
                }else if($select_action == 'trash' && $count){
                    $this->m_order->Action_order($check,'trash');
                }else if($select_action == 'restore' && $count){
                    $this->m_order->Action_order($check,'restore');
                }else if($select_action == 'delete' && $count){
                    $this->m_order->Action_order($check,'delete');
                }
            }

            $list_order = $this->paginate($arrOrder, 10,$pageNo);
            $data_view = array();
            $data_view['select_action'] = $select_action;
            $data_view['search']    = $search;
            $data_view['order_status'] = $order_status;
            $data_view['order_count']     = $order_count;
            return $this->orderView($list_order,$data_view);
        }else{
            if(!in_array($order_status, $arr_order_status)){
                return redirect('admin/order');
            }
            if(!in_array($select_action, $arr_select_action) && $select_action ){
                return redirect('admin/order');
            }
            /*--end check--*/
            if($select_action){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    return redirect('admin/order/edit/'.$check[0]);
                }else if($select_action == 'trash' && $count){
                    $this->m_order->Action_order($check,'trash');
                }else if($select_action == 'restore' && $count){
                    $this->m_order->Action_order($check,'restore');
                }else if($select_action == 'delete' && $count){
                    $this->m_order->Action_order($check,'delete');
                }
            }

            $list_order = $this->paginate($arrOrder, 10,$pageNo);
            $order_page = [];
            $order_page['order_status'] = $order_status ;
            $order_page['search'] = $search ;
            $order_page['customer_id'] = $customer_id ;
            return view('backend.pages.store.order.listOrder',[
                'list_order' => $list_order,
                'order_count' => $order_count,
                'order_status' => $order_status,
                'search' => $search,
                'customer_id'   => $customer_id,
                'pagination'    => $order_page,
                'order_prefix'    => $order_prefix,
                'order_suffix'    => $order_suffix,
            ]);
        }
    }

    private function orderView($list_order , $data_view = array()){
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
         $view = view('backend.pages.store.order.listViewOrder',[
                'list_order'         => $list_order,
                'order_count'         => $data_view['order_count'],
                'search'        => $data_view['search'],
                'order_status'   => $data_view['order_status']
            ]);
        $objdata['Page'] = urlencode($list_order->render());

        if($data_view['search']){
            $objdata['Page'] = urlencode($list_order->appends(array('search' => $data_view['search'],'order_status' => $data_view['order_status']))->render());
        }else {
            $objdata['Page'] = urlencode($list_order->appends(array('order_status' => $data_view['order_status']))->render());
        }
        $objdata['List'] = urlencode($view);
        return $objdata;
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'trash'){
            $objdata['Message'] = 'Xóa đơn hàng thành công!';
        }
        if($data_view['select_action'] == 'delete'){
            $objdata['Message'] = 'Đơn hàng đã được xóa vĩnh viễn!';
        }
        if($data_view['select_action'] == 'restore'){
            $objdata['Message'] = 'Khôi phục đơn hàng thành công!';
        }
        return $objdata;
    }

    public function create(){
        $provinces = $this->m_provinces->Get_all_provinces();
        $districts = [];
        if(Session::has('province')){
            $districts = $this->m_districts->Get_districts_by_province_id(Session::get('province'));
        }

        return view('backend.pages.store.order.createOrder',[
            'order_code' => '',
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $variant_number = isset($data['variant_number']) ? $data['variant_number']: [];
        $order_content = isset($data['order_content']) ? $data['order_content']: '';
        // $customer_id = isset($data['customer_id']) ? $data['customer_id']: '';
        $customer_email = isset($data['customer_email']) ? $data['customer_email']: '';
		$shipping_fullname = isset($data['shipping_fullname']) ? $data['shipping_fullname']: '';
        $shipping_phone = isset($data['shipping_phone']) ? $data['shipping_phone']: '';
        $shipping_address = isset($data['shipping_address']) ? $data['shipping_address']: '';
        $shipping_district = isset($data['shipping_district']) ? $data['shipping_district']: '';
        $shipping_district_name = isset($data['shipping_district_name']) ? $data['shipping_district_name']: '';
        $shipping_province = isset($data['shipping_province']) ? $data['shipping_province']: '';
        $shipping_province_name = isset($data['shipping_province_name']) ? $data['shipping_province_name']: '';
        $shipping_id = isset($data['shipping_id']) ? $data['shipping_id'] : '';
        $shipping_name = isset($data['shipping_name']) ? $data['shipping_name'] : '';
        $amount_shipping = isset($data['amount_shipping']) ? $data['amount_shipping'] : 0;
        $shipping_custom = isset($data['shipping_custom']) ? $data['shipping_custom'] : '';
        $amount_discount = isset($data['amount_discount']) ? $data['amount_discount'] : 0;
        $amount_discount_notes = isset($data['amount_discount_notes']) ? $data['amount_discount_notes'] : '';
        $order_type = isset($data['order_type']) ? $data['order_type'] : '';
        $product_id = $this->getProductId($variant_id);

        /* Customer Order */
        $customer_id = '';
        if($customer_email==''){
            return '{"Response":"False","Message":"Chưa chọn khách hàng"}';
        }
        $_customer = $customer->Get_customer_email($customer_email);
        if($_customer){
            $customer_id = $_customer->customer_id;
        }
        /* END */

        /* Check District */
        $check_district = $districts->check_district($shipping_district, $shipping_province);
        if(!$check_district){
            return 'Tỉnh thành không hợp lệ';
        }
        /* END */

        /* Check quantity buy */
        foreach ($variant_number as $value) {
            if($value=='' || $value<1){
                return '{"Response":"False","Message":"Số lượng không hợp lệ"}';
            }
        }
        /* END */

        /* Check Cart */
        if(count($product_id)==0){
            if($request->ajax()){
                return '{"Response":"False","Message":"Chưa có sản phẩm trong giỏ hàng"}';
            }
        }
        /*END */

        /* Check quantity inventory */
        $check_quantity = $this->checkquantityCart($variant_id,$variant_number);
        if($check_quantity){
            return '{"Response":"False","Message":"sản phẩm đã hết hàng"}';
        }
        if(!is_numeric($amount_discount)){
            return '{"Response":"False","Message":"Khuyến mãi phải là số"}';
        }
        /*END */

        /* Get Promotion Order */
        $i=0;
        $variants = [];
        foreach ($variant_id as $value) {
            $arr = [];
            $arr= [
                'variant_id' => $value,
                'quantity'  => $variant_number[$i],
            ];
            $i++;
            array_push($variants,$arr);
        }

        $cart_meta = promotionOrder($variants,null,null);
        // cart_meta['total'] số tienf sau khi đã trừ khuến mãi
        // cart_meta['discount_price'] số tiền khuyến mãi
        // cart_meta['title'] tên chương trình

        /* END */
        $province_name = $provinces->get_province_name($shipping_province);
        $district_name = $districts->get_district_name($shipping_district,$shipping_province);
        $dataInsert = [];
        $dataInsert['dataProductTemp'] = [
            'variant_id' => $variant_id,
            'variant_number' => $variant_number,
            'product_id' => $product_id
        ];
        $dataInsert['dataOrder'] = [
            'cart_meta' => $cart_meta,
            'customer_id' => $customer_id,
            'order_content' => $order_content,
        ];
        $dataInsert['dataCustomerInfo'] = [
            'customer_email' => $customer_email,
            'shipping_fullname' => $shipping_fullname,
            'shipping_phone' => $shipping_phone,
            'shipping_address' => $shipping_address,
            'shipping_province' => $shipping_province,
            'shipping_province_name' => $province_name,
            'shipping_district' => $shipping_district,
            'shipping_district_name' => $district_name,

        ];
        $dataInsert['dataShipping'] = [
            'shipping_id' => $shipping_id,
            'shipping_name' => $shipping_name,
            'amount_shipping' => $amount_shipping,
            'shipping_custom' => $shipping_custom
        ];
        $dataInsert['dataDiscount'] = [
            'amount_discount' => $amount_discount,
            'amount_discount_notes' => $amount_discount_notes,
        ];

        $order_code = '';
        $order_status = 3;
        $arrayOrderStatus = ['paid' => 0,'pending' => 1,'draft' => 3];

        if(array_key_exists($order_type,$arrayOrderStatus)){
           $order_status = $arrayOrderStatus[$order_type];
        }
        $result = $this->insertOrder($dataInsert,$order_status);
        $order_code = $result['order_code'];
        $order_id = $result['order_id'];


		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$order_code");
        /* END SAVE DATABASE LOG */

        if($request->ajax()){
            if($order_status==3){
                return '{"Response":"True","Redirect":"'.url('admin/order/draft/'.$order_code).'"}';
            }
            else{
                return '{"Response":"True","Redirect":"'.url('admin/order/detail/'.$order_id).'"}';
            }
        }
    }

    public function edit($order_code){
        $order_prefix=$this->m_option->getOptionValue_option('order_prefix');
        $order_suffix=$this->m_option->getOptionValue_option('order_suffix');
        $_order_code=$order_prefix.$order_code.$order_suffix;
        $provinces = $this->m_provinces->Get_all_provinces();
        $districts = [];
        if(Session::has('province') )
        {
            $districts = $this->m_districts->Get_districts_by_province_id(Session::get('province'));
        }


        /*check draft order */
        $_order = $this->m_order->Get_order_code_status($order_code,3);
        if(!$_order){
            return redirect('admin');
        }
        /* END */

        //số đơn hàng khách hàng đã mua
        $order_count = $this->m_order->Count_order_customer($_order->customer_id);
        //thông tin địa chỉ giao hàng
        $_order_meta = $this->m_order_meta->Get_order_meta_id($_order->order_id);
        //sản phẩm đã mua
        $_product_temp = $this->m_order_relationships->Get_product_temp_order_id ( $_order->order_id);
        $_order_meta_shipping = $this->m_order_meta->Get_order_meta_shipping($_order->order_id);
        $order_shipping = [];
        if($_order_meta_shipping){
            $shipping_name = $_order_meta_shipping->om_value;
            if($shipping_name==''){
                $order_shipping = [];
            }
            else{
                $order_shipping = ['shipping_name' => $_order_meta_shipping->om_value, 'shipping_price' => $_order->amount_ship];
            }
        }
        $array_product_temp = [];
        foreach ($_product_temp as $key => $value) {
            $image = Domain_CDN.'/0/1/not-found.png';
            $_variant = $this->m_variant->Get_variant_id($value->variant_id);
            $weight = 0;
            $inventory = 0;
            $out_of_stock = 0;
            $tracking_policy = 0;
            if($_variant){
                $weight = $_variant->weight;
                $inventory = $_variant->inventory;
                $out_of_stock = $_variant->out_of_stock;
                $tracking_policy = $_variant->tracking_policy;
            }
            $get_image = get_image($value->image,'thumb');
            if($get_image!=''){
                $image = $get_image;
            }
            $arr = [];
            $arr = [
                'order_id' => $value->order_id,
                'variant_id' => $value->variant_id,
                'product_id' => $value->product_id,
                'variant_name' => $value->variant_name,
                'title' => $value->title,
                'slug' => $value->slug,
                'price' => $value->price,
                'quantity_buy' => $value->quantity_buy,
                'weight' => $weight,
                'inventory' => $inventory,
                'out_of_stock' => $out_of_stock,
                'tracking_policy' => $tracking_policy,
                'image' => $image
            ];
            array_push($array_product_temp, $arr);
        }

        /* shipping price*/
        $province_id = isset($_order_meta['province_id'])? $_order_meta['province_id'] : 0;
        $district_id = isset($_order_meta['district_id'])? $_order_meta['district_id'] : 0;
        $shipping_info = $this->shippingInfo(['province' => $province_id,'district' => $district_id]);
        $shipping_info = json_decode($shipping_info);

        /* END */
        return view('backend.pages.store.order.edit',[
            'order_code' => $_order_code,
            'order' => $_order,
            'order_meta' => $_order_meta,
            'product_temp' => $_product_temp,
            'array_product_temp' => $array_product_temp,
            'order_shipping' => $order_shipping,
            'order_count' => $order_count,
            'provinces' => $provinces,
            'districts' => $districts,
            'shipping_info' => $shipping_info
        ]);
    }

    public function update($order_code,Request $request)
    {
        $data = $request->all();
        $variant_id = isset($data['variant_id']) ? $data['variant_id']: [];
        $variant_number = isset($data['variant_number']) ? $data['variant_number']: [];
        $order_content = isset($data['order_content']) ? $data['order_content']: '';
        $customer_email = isset($data['customer_email']) ? $data['customer_email']: '';
        $shipping_fullname = isset($data['shipping_fullname']) ? $data['shipping_fullname']: '';
        $shipping_phone = isset($data['shipping_phone']) ? $data['shipping_phone']: '';
        $shipping_address = isset($data['shipping_address']) ? $data['shipping_address']: '';
        $shipping_district = isset($data['shipping_district']) ? $data['shipping_district']: '';
        $shipping_district_name = isset($data['shipping_district_name']) ? $data['shipping_district_name']: '';
        $shipping_province = isset($data['shipping_province']) ? $data['shipping_province']: '';
        $shipping_province_name = isset($data['shipping_province_name']) ? $data['shipping_province_name']: '';
        $shipping_id = isset($data['shipping_id']) ? $data['shipping_id'] : '';
        $shipping_name = isset($data['shipping_name']) ? $data['shipping_name'] : '';
        $amount_shipping = isset($data['amount_shipping']) ? $data['amount_shipping'] : 0;
        $shipping_custom = isset($data['shipping_custom']) ? $data['shipping_custom'] : '';
        $amount_discount = isset($data['amount_discount']) ? $data['amount_discount'] : 0;
        $amount_discount_notes = isset($data['amount_discount_notes']) ? $data['amount_discount_notes'] : '';
        $order_type = isset($data['order_type']) ? $data['order_type'] : '';
        $product_id = $this->getProductId($variant_id);

        $_order = $this->m_order->Get_order_code($order_code)->first();
        if(!$_order){
            return redirect('admin');
        }
        /* xóa trước khi uodate */
        $_product_temp = $this->m_order_relationships->Get_product_temp_order_id ( $_order->order_id);
        foreach ($_product_temp as $key => $value) {
            $this->m_product_temp->Delete_product_temp($value->product_temp_id);
            //nhập trả lại kho
            $_variant = $this->m_variant->Get_variant_id($value->variant_id);
            if($_variant){
                if($_variant->tracking_policy==1){
                    $this->m_variant->Insert_variant([
                            'variant_id' => $_variant->variant_id,
                            'inventory' => $_variant->inventory+$value->quantity_buy
                            ]
                        );
                }
            }
        }
        $this->m_order_relationships->Delete_order_relationships($_order->order_id);
        $this->m_order_meta->Delete_order_meta($_order->order_id);
        /* END */

        /* Customer Order */
        $customer_id = '';
        if($customer_email==''){
            return '{"Response":"False","Message":"Chưa chọn khách hàng"}';
        }
        $_customer=$customer->Get_customer_email($customer_email);
        if($_customer){
            $customer_id = $_customer->customer_id;
        }

        /* END */

        /* Check District */
        $check_district = $districts->check_district($shipping_district, $shipping_province);
        if(!$check_district){
            return 'Tỉnh thành không hợp lệ';
        }
        /* END */
        /* Check quantity buy */
        foreach ($variant_number as $value) {
            if($value=='' || $value<1){
                return '{"Response":"False","Message":"Số lượng không hợp lệ"}';
            }
        }
        /* END */

        /* Check Cart */
        if(count($product_id)==0){
            if($request->ajax()){
                return '{"Response":"False","Message":"Chưa có sản phẩm trong giỏ hàng"}';
            }
        }
        /*END */

        /* Check quantity inventory */
        $check_quantity = $this->checkquantityCart($variant_id,$variant_number);
        if($check_quantity){
            return '{"Response":"False","Message":"sản phẩm đã hết hàng"}';
        }
        if(!is_numeric($amount_discount)){
            return '{"Response":"False","Message":"Khuyến mãi phải là số"}';
        }
        /*END */

        /* Get Promotion Order */
        $i=0;
        $variants = [];
        foreach ($variant_id as $value) {
            $arr = [];
            $arr= [
                'variant_id' => $value,
                'quantity'  => $variant_number[$i],
            ];
            $i++;
            array_push($variants,$arr);
        }
        $cart_meta = promotionOrder($variants,null,null);
        // cart_meta['total'] số tienf sau khi đã trừ khuến mãi
        // cart_meta['discount_price'] số tiền khuyến mãi
        // cart_meta['title'] tên chương trình

        /*END */
        $province_name = $provinces->get_province_name($shipping_province);
        if($province_name!=$shipping_province_name){
            $province_name=$shipping_province_name;
        }


        $district_name = $districts->get_district_name($shipping_district,$shipping_province);
        if($district_name!=$shipping_district_name){
            $district_name=$shipping_district_name;
        }
        $dataInsert = [];
        $dataInsert['dataProductTemp'] = [
            'variant_id' => $variant_id,
            'variant_number' => $variant_number,
            'product_id' => $product_id
        ];
        $dataInsert['dataOrder'] = [
            'order_id' =>  $_order->order_id,
            'cart_meta' => $cart_meta,
            'customer_id' => $customer_id,
            'order_content' => $order_content,
        ];
        $dataInsert['dataCustomerInfo'] = [
            'customer_email' => $customer_email,
            'shipping_fullname' => $shipping_fullname,
            'shipping_phone' => $shipping_phone,
            'shipping_address' => $shipping_address,
            'shipping_province' => $shipping_province,
            'shipping_province_name' => $province_name,
            'shipping_district' => $shipping_district,
            'shipping_district_name' => $district_name,

        ];
        $dataInsert['dataShipping'] = [
            'shipping_id' => $shipping_id,
            'shipping_name' => $shipping_name,
            'amount_shipping' => $amount_shipping,
            'shipping_custom' => $shipping_custom
        ];
        $dataInsert['dataDiscount'] = [
            'amount_discount' => $amount_discount,
            'amount_discount_notes' => $amount_discount_notes,
        ];
        /* Check Order status */
        $order_status = 3;
        $arrayOrderStatus = ['paid' => 0,'pending' => 1,'draft' => 3];
        if(array_key_exists($order_type,$arrayOrderStatus) )
        {
           $order_status = $arrayOrderStatus[$order_type];
        }
        $result = $this->insertOrder($dataInsert,$order_status);
        $order_code = $result['order_code'];
        $order_id = $result['order_id'];
        /* END */
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$order_code");
        /* END SAVE DATABASE LOG */

        if($request->ajax()){
            if($order_status==3){
                return '{"Response":"True","Redirect":"'.url('admin/order/draft/'.$order_code).'"}';
            }
            else{
                return '{"Response":"True","Redirect":"'.url('admin/order/detail/'.$order_id).'"}';
            }

        }
    }
    public function destroy($order_code)
    {
        $this->m_order->Delete_order($order_code);
		/*
          * ADD DATABASE LOG
          */
         addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$order_code");
         /* END SAVE DATABASE LOG */

        return redirect('admin/order');
    }
    private function convertDateTime($time){
        $current = strtotime(date("Y-m-d"));
        $date    = strtotime(date("Y-m-d", $time));
        $array_time = [
            date("H", $time),
            date("i", $time),
            date("d/m/Y", $time)
        ];
        $time= date('h:i', $time);
        list($hour, $minus, $day) = $array_time;
        $format = 'SA';
        if($hour>12){
            $format='CH';
        }
        $datediff = $date - $current;
        $difference = floor($datediff/(60*60*24));
        if($difference==0){
            $day='Hôm nay';
        }
        elseif($difference==-1){
            $day='Hôm qua';
        }
        return ['day' => $day,'format'=>$format,'time'=>$time];
    }
    public function orderdetail($order_id)
    {
        $_order = $this->m_order->Get_order_id($order_id);
        if(!$_order){
            return redirect('admin');
        }
        else{
            $order_status = $_order->order_status;
            if($order_status==3){
                return redirect('admin');
            }
        }
        $order_code = $_order->order_code;
        $order_weight = 0;
        $order_prefix=$this->m_option->getOptionValue_option('order_prefix');
        $order_suffix=$this->m_option->getOptionValue_option('order_suffix');

        $user_create='';
        if($_order->user_id!=0){
            $user_create = $this->m_user->get_username($_order->user_id);
        }
        if($_order->order_weight!=0){
            $order_weight = $this->convertWeight($_order->order_weight);
        }
        $order_code=$order_prefix.$order_code.$order_suffix;
        $_order_meta = $this->m_order_meta->Get_order_meta_id($order_id);

        $_product_temp = $this->m_order_relationships->Get_product_temp_order_id ( $order_id);
        /* sản phẩm đã mua */
        $array_product_temp = [];
        foreach ($_product_temp as $value) {
            $product_url = '';
            $_product = $this->m_product->Get_product_id($value->product_id);
            if($_product){
                $product_url = url('admin/product/edit/'.$_product->product_id);
            }
            $image = Domain_CDN.'/0/1/not-found.png';
            $_variant = $this->m_variant->Get_variant_id($value->variant_id);
            $get_image = get_image($_variant->image,'thumb');
            if($get_image!=''){
                $image = $get_image;
            }
            array_push($array_product_temp, [
                    'product_temp_id' => $value->product_temp_id,
                    'variant_id' => $value->variant_id,
                    'product_id' => $value->product_id,
                    'variant_name' => $value->variant_name,
                    'title' => $value->title,
                    'slug' => $value->slug,
                    'price' => $value->price,
                    'quantity_buy' => $value->quantity_buy,
                    'quantity_refuned' => $value->quantity_refuned,
                    'image' => $image,
                    'product_url' => $product_url
            ]);
        }

        $_product_temp = $array_product_temp;
        /* END*/
        /* Phí vận chuyển */
        $_order_meta_shipping = $this->m_order_meta->Get_order_meta_shipping($order_id);
        $order_shipping = [];
        if($_order_meta_shipping){
            $shipping_name = $_order_meta_shipping->om_value;
            if($shipping_name==''){
                $order_shipping = [];
            }
            else{
                $order_shipping = ['shipping_name' => $_order_meta_shipping->om_value, 'shipping_price' => $_order->amount_ship];
            }
        }

        $urlMap = $this->getUrlMap([
            'district' => $_order_meta['district'],
            'province' => $_order_meta['province'],
            'address'  => $_order_meta['address'] ]);
        /* END */
        /* đơn hàng hủy */
        $order_cancel = $this->m_order_meta->Get_order_meta_cancel($order_id);
        $data_cancel = [];
        if($order_cancel!=''){
            $date = $this->convertDateTime($order_cancel['cancel_time']);
            $data_cancel = [
                'user_cancel' => $order_cancel['cancel_user_name'],
                'reason_cancel' => $order_cancel['cancel_reason'],
                'note' => $order_cancel['cancel_note'],
                'time' => $date['day'].' '.$date['time'].' '.$date['format']
            ];
        }
        /* END */
        return view('backend.pages.store.order.orderDetail',[
            'order' => $_order,
            'order_code' => $order_code,
            'order_meta' => $_order_meta,
            'product_temp' => $_product_temp,
            'user_create' => $user_create,
            'order_weight' => $order_weight,
            'order_shipping' => $order_shipping,
            'urlMap' => $urlMap,
            'data_cancel' => $data_cancel
        ]);
    }

    public function refunedOrder($order_code){
        $_order = $this->m_order->Get_order_code($order_code)->first();
        $_product_temp = $this->m_order_relationships->Get_product_temp_order_id ( $_order->order_id);
        if(!$_order){
            return redirect('admin');
        }
        else{
            $order_status = $_order->order_status;
            if($order_status==2 || $order_status==3){
                return redirect('admin');
            }
        }
        return view('backend.pages.store.order.orderRefuned',[
            'order' => $_order,
            'product_temp' => $_product_temp
        ]);
    }

    public function refunedOrderSubmit($order_code,Request $request){
        $data = $request->all();
        $quantity_refuned = isset($data['refund-quantity']) ? $data['refund-quantity'] : [];
        $total_order = 0;
        $total_refuned = 0;
        $variants = [];
        $_order = $this->m_order->Get_order_code($order_code)->first();
        if(!$_order){
            return redirect('admin');
        }
        else{
            $order_status = $_order->order_status;
            if($order_status==2 || $order_status==3){
                return redirect('admin');
            }
        }
        /* cập nhật số lượng hàng trả lại */
        foreach ($quantity_refuned as $key => $value) {
            $_product_temp = $this->m_product_temp->Get_product_temp_id($key);
            $quantity_buy = $_product_temp->quantity_buy;
            $quantity_refuned = $_product_temp->quantity_refuned;
            if($value > 0 && $quantity_buy != $quantity_refuned && $quantity_refuned+$value<= $quantity_buy){
                $this->m_product_temp->Insert_product_temp([
                        'product_temp_id' => $key,
                        'quantity_refuned' => $value + $quantity_refuned
                    ]);
                $_variant = $this->m_variant->Get_variant_id($_product_temp->variant_id);
                if($_variant){
                    if($_variant->tracking_policy==1){
                        $this->m_variant->Insert_variant([
                                'variant_id' => $_variant->variant_id,
                                'inventory' => $_variant->inventory+$value
                                ]
                            );
                    }
                }
            }

            $_product_temp = $this->m_product_temp->Get_product_temp_id($key);

            $arr = [];
            $arr= [
                'variant_id' => $_product_temp->variant_id,
                'quantity'  => $_product_temp->quantity_buy-$_product_temp->quantity_refuned,
            ];
            array_push($variants,$arr);
            $quantity = $_product_temp->quantity_buy-$_product_temp->quantity_refuned;
            $total_refuned+=$_product_temp->price*$_product_temp->quantity_refuned;

            $total_order+=$_product_temp->price*$_product_temp->quantity_buy;
        }

        /* END */
        /* Get Promotion Order */
        $cart_meta = promotionOrder($variants,null,null);

        //cập nhật order
        $this->m_order->Insert_order(
            [
                'order_id' => $_order->order_id,
                'order_discount_notes' => $cart_meta['title'],
                'amount_payment' => $cart_meta['total'],
                'amount_discount' => $cart_meta['discount_price'],
                'amount_refuned' => $total_refuned,

                // 'amount_order' => $total_order
            ]
        );

        /* Kiểm tra sau khi hoàn trả */
        $_order = $this->m_order->Get_order_code($order_code)->first();
        if($_order->amount_refuned>0 && $_order->amount_refuned<$_order->amount_order){
            $this->m_order->Insert_order([
                'order_id' => $_order->order_id,
                'order_status' => 4
            ]);
        }
        if($_order->amount_refuned>0 && $_order->amount_refuned==$_order->amount_order){
            $this->m_order->Insert_order([
                'order_id' => $_order->order_id,
                'order_status' => 5
            ]);
        }
        /* END */
        //END
        return redirect('admin/order/refuned/'.$order_code);
    }

    public function CreateCustomer(Request $request){
        $data = $request->all();
        $phone=isset($data['phone']) ? $data['phone'] : '';
        $fullname=isset($data['fullname']) ? $data['fullname'] : '';
        $email=isset($data['email']) ? $data['email'] : '';
        $address=isset($data['address']) ? $data['address'] : '';
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'fullname' => 'max:40',
            'phone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|between:8,11',
            'email' => 'email|unique:qm_customer,customer_email',
        ],[
            'fullname.max' => 'Tên không được quá 40 kí tự',
            'phone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
            'phone.between' => 'Số điện thoại phải từ 8 đến 11 số',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',

        ]);

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
        }
        // Kiem tra 1 trong 3 truong co duoc nhap ko

        if( !$fullname || !$phone  || !$email ){
            $validator->getMessageBag()->add('','Bạn phải nhập ít nhất email, tên hoặc số điện thoại');
            if($request->ajax()){
                return '{"Response":"False","Message":"Bạn phải nhập ít nhất email, tên hoặc số điện thoại"}';
            }
        }
        // Check province
        $provinces = isset($data['provinces']) ? $data['provinces'] : 0;
        $get_provinces_id = $this->m_provinces->Get_provinces_id($provinces);
        if( $get_provinces_id == null )
        {
            $validator->getMessageBag()->add('provinces','Vui lòng chọn Tỉnh/Thành phố');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Tỉnh/Thành phố"}';
            }
        }
        // Check district
        $districts = isset($data['districts']) ? $data['districts'] : 0;
        $check_district = $this->m_districts->Check_district($districts,$provinces);
        if( $check_district == null )
        {
            $validator->getMessageBag()->add('districts','Vui lòng chọn Quận/Huyện');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Quận/Huyện"}';
            }
        }

        /*-- End Validator --*/

        $email_advertising = isset($data['email_advertising'])? '1' : '0';
        //Thêm vào customer
        $customer_arr = [];
        $customer_arr['customer_fullname'] = $fullname;
        $customer_arr['customer_phone'] = $phone;
        $customer_arr['customer_email'] = $email;
        $customer_arr['email_advertising'] = $email_advertising;
        $customer_arr['customer_address'] = $address;
        $customer_arr['customer_province'] = $provinces ;
        $customer_arr['customer_district'] = $districts ;
        $customer_id = $customer -> Insert_customer( $customer_arr );

        //Thêm vào customer meta
        $user_id = Session::get('user_id');
        $time = time();
        $customer_meta -> Insert_customer_meta($customer_id,'register_time', $time);
        if($user_id){
            $customer_meta -> Insert_customer_meta($customer_id,'register_by', $user_id);
        }
        $customer_new = $customer->Get_customer_id($customer_id);
        $district_customer = $this->m_districts->get_district_name($customer_new->customer_district,$customer_new->customer_province);
        $province_customer = $this->m_provinces->get_province_name($customer_new->customer_province);
        $json = [
            "customer_id" => $customer_new->customer_id,
            "customer_email" => $customer_new->customer_email,
            "customer_fullname" => $customer_new->customer_fullname,
            "customer_phone" => $customer_new->customer_phone,
            "customer_address" => $customer_new->customer_address,
            "customer_district" =>$customer_new->customer_district,
            "customer_district_name" =>$district_customer,
            "customer_province" =>$customer_new->customer_province,
            "customer_province_name" =>$province_customer,
            "customer_order_count" => 0
        ];
        $objdata = Array('Response'=>'False','Data'=>'');
        $objdata['Data'] = $json;
        if($objdata['Data']){
            $objdata['Response'] = 'True';
        }
        return $objdata;


    }

    public function CreateProduct(Request $request){
        $data = $request->all();
        $product_title=isset($data['product_title']) ? strip_tags(trim($data['product_title'])) : '';
        $price_new=isset($data['price_new']) ? str_replace( ',', '', $data['price_new']) : 0;
        $product_quantity=isset($data['product_quantity']) ? $data['product_quantity'] : 0;
        $product_ship=isset($data['product_ship']) ? 1 : 0;

        $validator = Validator::make($data,[
            'product_title'=>'required',
            'price_new'=>'required',
            'product_quantity'=>'required | numeric |min:1'
        ],[
            'product_title.required'=>'Chưa nhập tên sản phẩm',
            'price_new.required'=>'Chưa nhập giá',
            // 'price_new.numeric'=>'Giá phải là số',
            // 'price_new.min'=>'Giá phải lớn hơn 0',
            'product_quantity.required'=>'Chưa nhập số lượng',
            'product_quantity.numeric'=>'Số lượng phải là số',
            'product_quantity.min'=>'Số lượng phải lớn hơn 0',
        ]);

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
        }
        if(is_numeric($price_new)){
            if($price_new<=0){
                if($request->ajax()){
                    return '{"Response":"False","Message":"Giá phải lớn hơn 0"}';
                }
            }
        }
        else{
            if($request->ajax()){
                return '{"Response":"False","Message":"Giá phải số"}';
            }
        }
        // $product_title = strip_tags(trim($data['product_title']));
        // $price_new = $data['price_new'];

        /*-- Check Slug --*/
        //-----------------/
        if(strlen($product_title)==0){
            $slug = str_slug_product('create','no title');
        }else{
            $slug = str_slug_product('create',$product_title);
        }

        /*-- End Check Slug --*/
        $dataproduct = [];
        $dataproduct['product_title'] = $product_title;
        $dataproduct['product_slug'] = $slug;
        $dataproduct['user_id'] = Session::get('user_id');

        //xử lý thời gian
        $time=time();
        $product_image = [];
        $dataproduct['product_image'] = encode_serialize($product_image);
        $dataproduct['product_date'] = $time;
        $dataproduct['product_modified'] = $time;
        $dataproduct['product_status'] = 'public';
        $dataproduct['comment_status'] = 'yes';
        $product_id = $this->m_product->Insert_product($dataproduct);

        /* insert Product Meta */
        $data_productmeta = [];
        $data_productmeta['seo_title']= '';
        $data_productmeta['seo_description']= '';
        $data_productmeta['seo_keyword']= '';
        $this->m_product_meta->Insert_product_meta($product_id, 'product_data', encode_serialize($data_productmeta));

        /* END */
        //Insert variant
        $datavariant = [];
        $datavariant['product_id'] = $product_id;
        $datavariant['price_new'] = $price_new;
        $datavariant['ship'] = $product_ship;
        $variant_id= $this->m_variant->Insert_variant($datavariant);

        //END Insert variant
        //insert variant_meta
        $this->m_variant_meta->Insert_variant_meta($variant_id,'Title','Default Title',1);
        $this->m_variant_meta->Insert_variant_meta($variant_id,'option_order',1,0);

        //chọn danh mục mặc định
        $category_default = $this->m_option->getOptionValue_option('default_product_category');

        //Thêm mới
        $this->m_product_relationships-> Insert_product_relationships( $category_default, $product_id );

        //Đếm sản phẩm của danh mục
        $count = $this->m_product_relationships-> Count_product_relationships_term( $category_default);

        //Cập nhật count
        $this->m_taxonomy-> Update_taxonomy_count($category_default, $count);

        // $productList = $this->productList($request,[]);
        $objdata['Data'] = json_decode($this->GetProductInfo($variant_id));

        if($objdata['Data']){
            $objdata['Response'] = 'True';
        }
        return $objdata;
        //END insert variant_meta

    }
    public function Customergroupdiscount(Request $request){
        $data=$request->all();
        $taxonomy_id = isset($data['taxonomy_id']) ? $data['taxonomy_id'] : '';
        $time = time();
        $customer_gr = $discount->get_group_customer_discount($time,$taxonomy_id);
        $data_list = [];
        $discount_arr = [];
        $taxonomy_id = '';
        $taxonomy_name = '';
        foreach ($customer_gr as $c) {
            $taxonomy_id = $c->taxonomy_id;
            $taxonomy_name = $c->taxonomy_name;
            $discount_take_max = $discount->max_group_customer_discount($c->taxonomy_id,$c->discount_option,$time);
            array_push($discount_arr, ["discount_take" => $discount_take_max,"discount_type" => $c->discount_option]);

            // $amount_max = $this->max_group_customer_discount($customer_gr->taxonomy_id,'amount',$time);
            // $percentage_max = $this->max_group_customer_discount($customer_gr->taxonomy_id,'percentage',$time);

        }
        array_push($data_list, [
            "taxonomy_id" => $taxonomy_id,
            "taxonomy_name" => $taxonomy_name,
            "discount" => $discount_arr
        ]);

        return json_encode($data_list,JSON_UNESCAPED_UNICODE);
    }
    public function Productgroupdiscount(Request $request)
    {
        $data=$request->all();
        $taxonomy_id = isset($data['taxonomy_id']) ? $data['taxonomy_id'] : '';
        $time = time();
        $product_gr = $discount->get_group_product_discount($time,$taxonomy_id);
        $data_list = [];
        $discount_arr = [];
        $taxonomy_id = '';
        $taxonomy_name = '';
        foreach ($product_gr as $p) {
            $taxonomy_id = $p->taxonomy_id;
            $taxonomy_name = $p->taxonomy_name;
            $discount_take_max = $discount->max_group_product_discount($p->taxonomy_id,$p->discount_option,$time);
            array_push($discount_arr, ["discount_take" => $discount_take_max,"discount_type" => $p->discount_option]);

        }
        array_push($data_list, [
            "taxonomy_id" => $taxonomy_id,
            "taxonomy_name" => $taxonomy_name,
            "discount" => $discount_arr
        ]);

        return json_encode($data_list,JSON_UNESCAPED_UNICODE);
    }
    public function getVariantTitleProduct($variant_id){
        $variant_title='';
        $variant_meta_list=$this->m_variant_meta->Get_variant_meta_id($variant_id);

        foreach ($variant_meta_list as $value) {
            $variant_title.=$value->variant_value.' / ';
        }
        $variant_title=substr($variant_title, 0, -2);
        return trim($variant_title);
    }

    private function addProductTemp($data = array()){
        $variant_number = $data['variant_number'];
        $product_temp_id = [];
        $i=0;
        $total_order=0;
        $total_weight=0;
        $variants = [];
        $array = [];
        /* Insert Product_Temp */
        foreach ($data['variant_id'] as $value) {
            $arr = [];
            $arr= [
                'variant_id' => $value,
                'quantity'  => $data['variant_number'][$i],
            ];
            array_push($variants,$arr);
            $product_title = $this->m_product->Get_product_id($data['product_id'][$i])->product_title;
            $product_slug = $this->m_product->Get_product_id($data['product_id'][$i])->product_slug;
            $price = $this->m_variant->Get_variant_id($value)->price_new;
            $weight = $this->m_variant->Get_variant_id($value)->weight;
            $variant_image = $variant -> Get_variant_id($value)->image;
            $data_product_temp = [];
            $data_product_temp['variant_id'] = $value;
            $data_product_temp['product_id'] = $data['product_id'][$i];
            $data_product_temp['variant_name'] = $this->getVariantTitleProduct($value);
            $data_product_temp['title'] = $product_title;
            $data_product_temp['slug'] =$product_slug;
            $data_product_temp['price'] =$price;
            $data_product_temp['quantity_buy'] = $variant_number[$i];
            $data_product_temp['quantity_refuned'] = 0;
            $data_product_temp['image'] = $variant_image;
            $total_order+=$price*$variant_number[$i];
            $total_weight+=$weight*$variant_number[$i];
            $temp_id = $this->m_product_temp->Insert_product_temp($data_product_temp);
            $get_variant = $variant -> Get_variant_id($value);
            //quản lý tồn kho
            if($get_variant->tracking_policy==1){
                 $this->m_variant->Update_variant($value, [ 'inventory'=> $get_variant->inventory - $data['variant_number'][$i] ]);
            }
            array_push($product_temp_id, $temp_id);
            $i++;
        }
        $array = [
            'variants' => $variants,
            'product_temp_id' => $product_temp_id,
            'total_order' => $total_order,
            'total_weight'=> $total_weight
            ];
        return $array;
    }


    private function addOrder($data = array()){
        $order_status = $data['order_status'];
        $cart_meta = $data['cart_meta'];
        $product_temp_id = $data['product_temp_id'];
        $order_arr['user_id'] = Session::get('user_id');
        $order_arr['customer_id'] = $data['customer_id'];
        $order_arr['order_content'] = $data['order_content'];
        $order_arr['order_weight'] = $data['total_weight'];
        //$order_arr['order_discount'] = $order_discount; //đơn hàng giảm giá
        $order_arr['order_discount_notes'] = $cart_meta['title'];
        $order_arr['amount_order'] = $data['total_order']; //số tiền đơn hàng như bên cart
        $order_arr['amount_payment'] = $cart_meta['total']; //số tiền thanh toán như bên checkout
        //$order_arr['amount_refuned'] = $amount_refuned; //số tiền hoàn trả
        $order_arr['amount_discount'] = $cart_meta['discount_price'];
        //$order_arr['amount_ship'] = $amount_ship; //số tiền vận chuyển

        if($order_status==0){
            $order_arr['date_payment'] = time();
        }
        //$order_arr['date_payment'] = $date_payment; ngày thanh toán
        //$order_arr['ship_status'] = $ship_status; tình trạng vận chuyển
        $order_arr['order_status'] = $order_status;
        //$order_arr['payment_type'] = $payment_type; loại thanh toán
        //$order_arr['payment_status'] = $payment_status; tình trạng thanh toán
        $order_arr['order_active'] = 1;
        $order_id = 0;
        if(isset($data['order_id'])){
            $order_id = $data['order_id'];
            $order_arr['order_id'] = $order_id;
            $this->m_order->Insert_order($order_arr);
        }
        else{
            $order_arr['date_create'] = time();
            $order_id = $this->m_order->Insert_order($order_arr);
        }

        /*Cap nhat order code*/
        $order_code = 1000+$order_id;
        $order_update = [];
        $order_update['order_id'] = $order_id;
        $order_update['order_code'] = $order_code;
        $this->m_order->Insert_order($order_update);
        /*END*/

        foreach($product_temp_id as $temp_id){
            $this->m_order_relationships->Insert_order_relationships($order_id,$temp_id );
        }
        $arr = ['order_id' => $order_id,'order_code'=> $order_code];
        return $arr;
        /*End order*/
    }

    private function addCustomerInfo($order_id = 0,$data = array()){
        $shipping_info = [];
        $shipping_info['email'] = $data['customer_email'];
        $shipping_info['fullname'] = $data['shipping_fullname'];
        $shipping_info['phone'] = $data['shipping_phone'];
        $shipping_info['address'] = $data['shipping_address'];
        $shipping_info['gender'] = 0;
        $shipping_info['province_id'] = $data['shipping_province'];
        $shipping_info['province'] = $data['shipping_province_name'];
        $shipping_info['district_id'] = $data['shipping_district'];
        $shipping_info['district'] = $data['shipping_district_name'];
        $meta_key = 'shipping_info';
        $meta_value = encode_serialize($shipping_info);
        $this->m_order_meta->Insert_ordermeta($order_id, $meta_key, $meta_value);
    }

    private function addShipping($order_id =0,$data = array()){
        $shipping_id = isset($data['shipping_id']) ? $data['shipping_id'] : 0;
        $shipping_name = isset($data['shipping_name']) ? $data['shipping_name'] : '';
        $amount_shipping = isset($data['amount_shipping']) ? $data['amount_shipping'] : 0;
        $shipping_custom = isset($data['shipping_custom']) ? $data['shipping_custom'] : '';
        if($shipping_custom==''){
            $_shipping = $this->m_shipping->Get_shipping_id($shipping_id);
            if($_shipping){
                $shipping_name = $_shipping->name;
            }
        }
        else{
            $_shipping_all = $this->m_shipping->Get_place_id();

            $shipping_data = [];
            $shipping_data['name'] = $shipping_name;
            $shipping_data['price'] = $amount_shipping;
            $shipping_data['type'] = 'price';
            $shipping_data['parent'] = $_shipping_all->shipping_id;
            $shipping_id = $this->m_shipping->Insert_shipping($shipping_data);
        }
        if($shipping_id==0 && $shipping_custom){
            $amount_shipping=0;
            $shipping_name='';
        }

        $meta_key = 'shipping_name';
        $this->m_order_meta->Insert_ordermeta($order_id, $meta_key, $shipping_name);

        //update shippping_id
        // $_order = $this->m_order->Get_order_id($order_id);
        $amount_payment = $this->m_order->Get_order_id($order_id)->amount_payment;
        $this->m_order->Insert_order([
            'order_id'=>$order_id,
            'shipping_id'=>$shipping_id,
            'amount_ship'=>$amount_shipping,
            'amount_payment'=>$amount_shipping+$amount_payment,
            ]);
        if($shipping_custom!=''){
            //xóa shipping sau khi insert vào order
            $this->m_shipping->Delete_shipping($shipping_id);
        }
        //END
    }
    private function addDiscount($order_id =0,$data = array()){
        $amount_payment = $this->m_order->Get_order_id($order_id)->amount_payment;
        $this->m_order->Insert_order([
            'order_id'=>$order_id,
            'order_discount'=>$data['amount_discount'],
            'amount_discount_notes'=>$data['amount_discount_notes'],
            'amount_payment'=>$amount_payment-$data['amount_discount'],
        ]);

    }


    private function insertOrder($data = array(),$order_status = 3)
    {

        /* insert Product Temp*/
        $dataProductTemp = [];
        $dataProductTemp = $data['dataProductTemp'];
        $array = $this->addProductTemp($dataProductTemp);
        /* END */

        /* add new Order */
        $dataOrder = [];
        $dataOrder = $data['dataOrder'];
        $dataOrder['product_temp_id'] = $array['product_temp_id'];
        $dataOrder['total_order'] = $array['total_order'];
        $dataOrder['total_weight'] = $array['total_weight'];
        $dataOrder['order_status'] = $order_status;
        $array_order = $this->addOrder($dataOrder);
        /* END */
        $order_id = $array_order['order_id'];
        $order_code = $array_order['order_code'];
        /* update Customer Info */
        $dataCustomerInfo = [];
        $dataCustomerInfo = $data['dataCustomerInfo'];
        $this->addCustomerInfo($order_id,$dataCustomerInfo);
        /* END */
        /* update Shipping */
        $dataShipping = [];
        $dataShipping = $data['dataShipping'];
        $this->addShipping($order_id,$dataShipping);
        /* END */
        /* update Discount */
        $dataDiscount = [];
        $dataDiscount = $data['dataDiscount'];
        $this->addDiscount($order_id,$dataDiscount);
        /* END */
        return ['order_id' => $order_id, 'order_code' => $order_code];
    }
    public function trash($order_code){
        $_order = $this->m_order->Get_order_code($order_code)->first();
        if(!$_order){
            return redirect('admin');
        }
        else{
            if($_order->order_status==2 || $_order->order_status==3){
                return redirect('admin');
            }
        }
        return view('backend.pages.store.order.trash',[
            'order' => $_order,

        ]);
    }
    public function activeOrder($order_code){
        $_order = $this->m_order->Get_order_code($order_code)->first();

        if(!$_order){

        }
        else{
            if($_order->order_active==1){

            }
        }

        $order_id = $_order->order_id;
        $this->m_order->Insert_order([
            'order_id'=>$order_id,
            'order_active'=>1,
        ]);
        return redirect('admin/order/detail/'.$order_id);

    }
    public function trashSubmit($order_code,Request $request){
        $data = $request->all();
        $_order = $this->m_order->Get_order_code($order_code)->first();
        if(!$_order){
            return redirect('admin');
        }
        else{
            if($_order->order_status==2){
                return redirect('admin');
            }
        }
        $cancel_reason_order = isset($data['CancelReasonOrder']) ? $data['CancelReasonOrder'] : 4;
        $cancel_note = isset($data['CancelNote']) ? $data['CancelNote'] : '';
        $array_reason = [
            1 => 'Khách hàng đổi ý',
            2 => 'Đơn hàng giả mạo',
            3 => 'Hết hàng',
            4 => 'Khác'
        ];

        if(!array_key_exists($cancel_reason_order,$array_reason)){
            $cancel_reason_order = 4;
        }
        $order_id = $_order->order_id;
        $order_status = $_order->order_status;
        $order_cancel = [];
        $order_cancel['cancel_user_id'] = Session::get('user_id');
        $order_cancel['cancel_user_name'] =  $this->m_user->get_username(Session::get('user_id'));
        $order_cancel['cancel_time'] = time();
        $order_cancel['cancel_reason'] = $array_reason[$cancel_reason_order];
        $order_cancel['cancel_note'] = $cancel_note;
        $meta_key = 'order_cancel';
        $meta_value = encode_serialize($order_cancel);
        $this->m_order_meta->Insert_ordermeta($order_id, $meta_key, $meta_value);
        $this->m_order->Insert_order([
            'order_id'=>$order_id,
            'order_status'=>2,
        ]);

        /* Hoàn trả */
        $_product_temp = $this->m_order_relationships->Get_product_temp_order_id($order_id);
        foreach ($_product_temp as $key => $value) {
            $quantity_current_buy = $value->quantity_buy - $value->quantity_refuned;
            $this->m_product_temp->Insert_product_temp([
                'product_temp_id' => $value->product_temp_id,
                'quantity_refuned' => $value->quantity_buy
            ]);
            $_variant = $this->m_variant->Get_variant_id($value->variant_id);
            if($_variant){
                if($_variant->tracking_policy==1){
                    $this->m_variant->Insert_variant([
                            'variant_id' => $_variant->variant_id,
                            'inventory' => $_variant->inventory+$quantity_current_buy
                            ]
                        );
                }
            }
        }
        if($order_status!=1 && $order_status!=3){
            $this->m_order->Insert_order([
                'order_id'=>$order_id,
                'order_status'=>2,
                'amount_refuned'=>$_order->amount_payment
            ]);
        }
        /* END */
        return redirect('admin/order/detail/'.$order_id);
    }

    public function checkquantityCart($variant_id = array(), $quantity = array()){
        $i = 0;
        foreach ($variant_id as $key => $value) {
            $_variant = $this->m_variant->Get_variant_id($value);
            if($_variant){
                if($_variant->tracking_policy==1){
                    if($_variant->out_of_stock==0){
                        if($quantity[$i]>$_variant->inventory){
                            return true;
                        }
                    }
                }
            }
            $i++;
        }
        return false;
    }

    public function getPromotion(Request $request){
        $data = $request->all();
        // $variant_id = isset($data['variant_id']) ? $data['variant_id'] : [];
        // $variant_number = isset($data['variant_number']) ? $data['variant_number'] : [];
        $variant = isset($data['variant']) ? $data['variant'] : [];

        $variants = [];
        if(count($variant)>0){
            foreach ($variant as $key => $value) {
                $arr = [];
                $arr= [
                    'variant_id' => $value['variant_id'],
                    'quantity'  => $value['variant_quantity'],
                ];
                array_push($variants,$arr);
            }

            $cart_meta = promotionOrder($variants,null,null);
            return $cart_meta;
        }
    }

    public function GetProductList(Request $request){
        $data= $request->all();
        return $this->productList($request,$data);

    }
    private function productList($request = '',$data = array()){
        $objdata = Array('Response'=>'False','Data'=>'');
        if($request->ajax()){
            $search = isset($data['search']) ? $data['search']: '';
            $product_list = $product -> Get_product_list_order( $search);
            $array_product=[];

            foreach ($product_list as $product)
            {
                $productImage=decode_serialize($this->m_product->product_image);
                $data_product_image=[];
                foreach($productImage as $key => $value){
                    if( strlen($value) > 0 )
                    {
                        if( !filter_var($value, FILTER_VALIDATE_URL) )
                        {
                            $query = get_image($value);
                            if( $query != null )
                            {
                                array_push($data_product_image, get_image($value,'thumb'));
                            }
                        }
                    }
                }

                $product_variant=$this->m_variant->Get_variant_product_order($this->m_product->product_id);
                $array_variant=[];

                foreach ($product_variant as $variant) {
                    $variant_title='';
                    $variant_meta_list=$this->m_variant_meta->Get_variant_meta_id($this->m_variant->variant_id);

                    foreach ($variant_meta_list as $value) {
                        $variant_title.=$value->variant_value.' / ';
                    }

                    $variant_title=substr($variant_title, 0, -2);
                    // $image_variant=$this->Get_url_image($this->m_variant->image);

                    array_push($array_variant, [
                    "variant_id"=>$this->m_variant->variant_id,
                    "variant_name"=>$variant_title,
                    "price_old"=>$this->m_variant->price_old,
                    "price_new"=>$this->m_variant->price_new,
                    "weight"=>$this->m_variant->weight,
                    "tracking_policy"=>$this->m_variant->tracking_policy,
                    "out_of_stock"=>$this->m_variant->out_of_stock,
                    "quantity"=>$this->m_variant->quantity,
                    "inventory"=>$this->m_variant->inventory,
                    "ship"=>$this->m_variant->ship,

                    ]);
                }

                $image = '';
                if(count($data_product_image)>0){
                    $image = $data_product_image[0];
                }
                else{
                    $image = Domain_CDN.'/0/1/not-found.png';
                }
                 array_push($array_product, [
                    "product_id" => $this->m_product->product_id,
                    "product_title"=>$this->m_product->product_title,
                    "product_image" => $image,
                    "variant"=>$array_variant
                    ]);

            }

            $view = view('backend.pages.store.order.listProduct',[
                    'product_list'         => $array_product,
            ]);
            $objdata['Data'] = urlencode($view);

            if($objdata['Data']){
                $objdata['Response'] = 'True';
            }
        }
        return $objdata;
    }
    public function GetProductInfo($variant_id){
        $image = Domain_CDN.'/0/1/not-found.png';
        $_variant = $this->m_variant->Get_variant_id($variant_id);
        $get_image = get_image($_variant->image,'thumb');

        if($get_image!=''){
            $image = $get_image;
        }

        $data_info = [];
        $data_info['product_id'] =$_variant->product_id;
        $data_info['product_title'] = $this->m_product->Get_product_id($_variant->product_id)->product_title;
        $data_info['variant_id'] = $_variant->variant_id;
        $data_info['variant_name'] = $this->getVariantTitleProduct($variant_id);
        $data_info['variant_image'] = $image;
        $data_info['price_old'] = $_variant->price_old;
        $data_info['price_new'] = $_variant->price_new;
        $data_info['weight'] = $_variant->weight;
        $data_info['tracking_policy'] = $_variant->tracking_policy;
        $data_info['out_of_stock'] = $_variant->out_of_stock;
        $data_info['quantity'] = $_variant->quantity;
        $data_info['inventory'] = $_variant->inventory;
        $data_info['ship'] = $_variant->ship;
        $data_info['product_url'] = url('admin/product/edit/'.$_variant->product_id);
        return json_encode($data_info,JSON_UNESCAPED_UNICODE);
    }

    public function GetCustomerList(Request $request){
        $data= $request->all();
        return $this->customerList($request,$data);
    }

    private function customerList($request = '',$data = array()){
        $objdata = Array('Response'=>'False','Data'=>'');

        if($request->ajax()){
            $search = isset($data['search']) ? $data['search']: '';
            $customer_list = $customer->Get_customer_list_order( $search);
            $customer_product=[];
            foreach ($customer_list as $customer) {
                $image_avatar = '';
                $district_customer = $districts->get_district_name($customer->customer_district,$customer->customer_province);
                $province_customer = $provinces->get_province_name($customer->customer_province);
                $order_count = $this->m_order->Count_order_customer($customer->customer_id);
                $get_avatar = $customer_meta->Get_customer_meta_key($customer->customer_id,'avatar');
                if(count($get_avatar)>0){
                    $image_avatar = $customer_meta->Get_customer_meta_key($customer->customer_id,'avatar')->meta_value;
                }
                array_push($customer_product, [
                    // "phone" =>$customer->customer_phone,
                    // "address" =>$customer->customer_address,
                    // "district_id" =>$customer->customer_district,
                    // "district_name" =>$district_customer,
                    // "province_id" =>$customer->customer_province,
                    // "province_name" =>$province_customer,
                    // "order_count" =>$order_count,
                    "customer_id" => $customer->customer_id,
                    "customer_fullname" => $customer->customer_fullname,
                    "customer_email" => $customer->email,
                    "avatar" => $image_avatar
                    ]);

            }
            // return $customer_list;
            $view = view('backend.pages.store.order.listCustomer',[
                    'customer_list'         => $customer_list,
            ]);
            $objdata['Data'] = urlencode($view);
            if($objdata['Data']){
                $objdata['Response'] = 'True';
            }
        }
        return $objdata;
    }
    public function GetCustomerInfo($customer_id){
        $image_avatar = '';
        $_customer = $customer->Get_customer_id($customer_id);
        $customer_district_name = $districts->get_district_name($_customer->customer_district,$_customer->customer_province);
        $customer_province_name = $provinces->get_province_name($_customer->customer_province);
        $get_avatar = $customer_meta->Get_customer_meta_key($customer->customer_id,'avatar');

        if(count($get_avatar)>0){
            $image_avatar = $customer_meta->Get_customer_meta_key($customer->customer_id,'avatar')->meta_value;
        }

        $order_count = $this->m_order->Count_order_customer($customer_id);
        $data_info = [];
        $data_info['customer_id'] = $_customer->customer_id;
        $data_info['customer_fullname'] = $_customer->customer_fullname;
        $data_info['customer_email'] = $_customer->customer_email;
        $data_info['customer_phone'] = $_customer->customer_phone;
        $data_info['customer_address'] = $_customer->customer_address;
        $data_info['email_advertising'] = $_customer->email_advertising;
        $data_info['customer_province'] = $_customer->customer_province;
        $data_info['customer_province_name'] = $customer_province_name;
        $data_info['customer_district'] = $_customer->customer_district;
        $data_info['customer_district_name'] = $customer_district_name;
        $data_info['customer_gender'] = $_customer->customer_gender;
        $data_info['customer_order_count'] = $order_count;

        $data_info['avatar'] = $image_avatar;

        return json_encode($data_info,JSON_UNESCAPED_UNICODE);
        // return $data_info;
        // return $this->m_order->Count_order_customer($customer_id);
    }

    public function getShipping(Request $request){
        $data = $request->all();
        $province = isset($data['province']) ? $data['province'] : '';
        $district = isset($data['district']) ? $data['district'] : '';
        return $this->shippingInfo(['province' => $province,'district' => $district]);

    }
    private function shippingInfo($data = array()){
        $province = $data['province'];
        $district = $data['district'];
        $data_array = [];
        $temp_all = [];
        $temp_province = [];
        $temp_district = [];

        /* tỉnh thành */
        if($province!='' && $district!=''){
            $_shipping_province = $this->m_shipping->Get_place_id($province);
            if($_shipping_province){
                $_shipping_province_list = $this->m_shipping->Get_shipping_child($_shipping_province->shipping_id);
                foreach ($_shipping_province_list as $value) {
                    $_shipping_district =  $this->m_shipping->Get_shipping_district($district,$value->shipping_id);
                    $temp_district = [];
                    if($_shipping_district){
                        if($_shipping_district->status==0){
                            // array_push($temp_province, [
                            //     'id' => $value->shipping_id,
                            //     'name' => $value->name,
                            //     'type' => $value->type,
                            //     'rate_from' => $value->rate_from,
                            //     'rate_to' => $value->rate_to,
                            //     'price' => $value->price,
                            //     'district' => $temp_district
                            //     ]);
                        }
                        else{
                            // $temp_district = [
                            //             'shipping_id' => $_shipping_district->shipping_id,
                            //             'shipping_name' => $_shipping_district->name,
                            //             'price' => $value->price + $_shipping_district->price
                            //         ];
                            array_push($temp_province, [
                            'id' => $value->shipping_id,
                            'name' => $value->name,
                            'type' => $value->type,
                            'rate_from' => $value->rate_from,
                            'rate_to' => $value->rate_to,
                            'price' => $value->price + $_shipping_district->price
                            // 'price' => $value->price,
                            // 'district' => $temp_district
                            ]);
                        }
                    }
                    else{
                        // array_push($temp_province, [
                        //     'id' => $value->shipping_id,
                        //     'name' => $value->name,
                        //     'type' => $value->type,
                        //     'rate_from' => $value->rate_from,
                        //     'rate_to' => $value->rate_to,
                        //     'price' => $value->price,
                        //     'district' => $temp_district
                        //     ]);
                    }
                }
                if(count($temp_province)>0){
                    $data_array['shipping_id'] = $_shipping_province->shipping_id;
                    $data_array['shipping_name'] = $_shipping_province->name;
                    $data_array['shipping_data'] = $temp_province;
                    return json_encode($data_array,JSON_UNESCAPED_UNICODE);
                }
                // array_push($data_array, [
                // 'shipping_id' => $_shipping_province->shipping_id,
                // 'shipping_name' => $_shipping_province->name,
                // 'shipping_data' => $temp_province]);
            }
        }
        /* END */
        $_shipping_all = $this->m_shipping->Get_place_id();

        /* Tất cả tỉnh thành */
        if(count($_shipping_all)>0){
            $_shipping_all_list = $this->m_shipping->Get_shipping_child($_shipping_all->shipping_id);
            foreach ($_shipping_all_list as $value) {
                array_push($temp_all, [
                    'id' => $value->shipping_id,
                    'name' => $value->name,
                    'type' => $value->type,
                    'rate_from' => $value->rate_from,
                    'rate_to' => $value->rate_to,
                    'price' => $value->price]);
            }

            // array_push($data_array, [
            //         'shipping_id' => $_shipping_all->shipping_id,
            //         'shipping_name' => $_shipping_all->name,
            //         'shipping_data' => $temp_all]);

            $data_array['shipping_id'] = $_shipping_all->shipping_id;
            $data_array['shipping_name'] = $_shipping_all->name;
            $data_array['shipping_data'] = $temp_all;

            return json_encode($data_array,JSON_UNESCAPED_UNICODE);
            /* END */
        }
        else{
            return ;
        }
    }

    private function getProductId($variant_id = array()){
        $array  = [];
        foreach ($variant_id as $key => $value) {
            $product_id = $this->m_variant->Get_variant_id($value)->product_id;
            array_push($array, $product_id);
        }
        return $array;
    }

    private function getUrlMap($data = array()){
        $address = isset($data['address']) ? $data['address'] : '';
        $province = isset($data['province']) ? $data['province'] : '';
        $district = isset($data['district']) ? $data['district'] : '';
        if($address != '' && $province!='' && $district!=''){
            return $url = "https://www.google.com/maps/place/$address $district $province Vietnam";
        }
    }

    private function convertWeight($value){
        $weight = number_format($value / 1000, 2);
        return $weight;
    }
}