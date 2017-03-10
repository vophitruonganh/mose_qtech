<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\frontend\FrontendController;
use Request;
use App\Http\Requests;

/*
 * Use Library of Laravel
 */
use DB;
use Session;
use Cookie;
use Illuminate\Http\Response;
use Validator;
use App\Models\Order;
use App\Models\Ordermeta;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantMeta;
use App\Models\Customer;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\ProductTemp;
use App\Models\OrderRelationships;
use Mail;
use Route;
use Input;

class OrderController extends FrontendController
{
    /**
     * Class Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    //TINH CART = SESSION
    public function getOrder($product_slug)
    {
        $data = Request::all();
        $response   = new Response();
        // $product - variant - user
        //Lấy variant đầu tiên của sản phẩm
        $variant_first = Get_first_variant_id_product( 'product_slug', $product_slug);
        $quantity       = $data['quantity'] <=0 ? 1 : $data['quantity'] ;
        $product        = $this->m_product->  Get_product_slug($product_slug);
        $variant_id     = isset($data['variant_id']) ? $data['variant_id']: '';
        $variant_id     =  !empty($variant_id) ? $variant_id : $variant_first['variant_id'];
        $customer_id    = Session::has('customer_id_frontend') ? Session::get('customer_id_frontend') : null;
        $product_meta = promotionFace($product->product_id,$variant_id);
        $variant_meta = $this->m_variant_meta -> Get_variant_meta_id($variant_id);
        /*Lấy test phiên bản*/
        $variant_value = '';
        foreach($variant_meta as $v){
            $variant_value .= $v->variant_value.' x ';
        }
        $variant_value = substr($variant_value,0,-3);
        /*End*/
        /*Lấy hình ảnh của phiên bản*/
        $variant_detail = $this->m_variant->Get_variant_id($variant_id);
        $variant_image = isset($variant_detail->image) ? $variant_detail->image: '';
        /*End */
        $data_order = [];

        if(empty(Cookie::get('cart'))){
            $order = [
                'product_id'        => $product->product_id,
                'product_code'        => $variant_detail->sku,
                'product_title'     => $product->product_title,
                'product_slug'      => $product->product_slug,
                'variant_meta'        => $variant_value,
                'variant_image'     => $variant_image,
                'price'     => $product_meta['price_new'],
                'quantity'  => $quantity,
                'variant_id'  => $variant_id,
            ];
            array_push($data_order,$order);

            $cart = encode_serialize($data_order);
            Cookie::queue('cart', $cart, 86400);
        }else{
           $data_order = decode_serialize(cookie::get('cart'));

           $array_variant_id = [];
           foreach( $data_order as $array ){
                $array_variant_id[] = $array['variant_id'];
           }

           if( in_array($variant_id, $array_variant_id) ){
                foreach( $data_order as $k => $v ){
                    if( $variant_id == $v['variant_id'] ){
                        $data_order[$k]['quantity'] += $quantity;
                    }
               }
           }
           else
           {
                $order = [
                    'product_id'        => $product->product_id,
                    'product_code'        => $variant_detail->sku,
                    'product_title'     => $product->product_title,
                    'product_slug'      => $product->product_slug,
                    'variant_meta'        => $variant_value,
                    'variant_image'     => $variant_image,
                    'price'     => $product_meta['price_new'],
                    'quantity'  => $quantity,
                    'variant_id'  => $variant_id,
                ];
                array_push($data_order,$order);
           }
           $cart = encode_serialize($data_order);
           Cookie::queue('cart', $cart, 86400);
        }
        return redirect('cart');

    }

    //SHOW CART
    public function getCart(){
        return view('frontend.'.$this->active_template.'.pages.cart.cart');
    }

    //UPDATE CART
    public function postCart(){
        $data = Request::all();
        $quantity_arr = $data['quantity'];
        $submit = isset($data['update']) ? $data['update'] : 'update_all' ;
        $submit = is_int($submit) ? $submit : 'update_all';
        //update tất cả sản phẩm
        if($submit == 'update_all')
        {
            $data_order = decode_serialize(cookie::get('cart'));

            foreach ($quantity_arr as $key=> $quantity)
            {

                $variant_id = $key;
                $quantity = $quantity <=0 ? 1 : $quantity;
                foreach( $data_order as $k => $v )
                {
                    if( $variant_id == $v['variant_id'] )
                    {
                        $data_order[$k]['quantity'] = $quantity;
                    }
                }
            }

            $cart = encode_serialize($data_order);
            Cookie::queue('cart', $cart, 86400);
            /*End cập nhật*/


        }else{
            $variant_id = $submit;
            $this->update_quantity_product ($variant_id, $quantity_arr[$variant_id]);
        }
        return redirect('cart');
    }

    private function update_quantity_product ($variant_id = '', $quantity = '')
    {
        $data_order = decode_serialize(cookie::get('cart'));
        $quantity = $quantity<=0 ? 1: $quantity;
        $array_variant_id = [];
        foreach( $data_order as $array )
        {
            $array_variant_id[] = $array['variant_id'];
        }

        if( in_array($variant_id, $array_variant_id) )
        {
            foreach( $data_order as $k => $v )
            {
                if( $variant_id == $v['variant_id'] )
                {
                     $data_order[$k]['quantity'] = $quantity;
                }
            }
        }

        $cart = encode_serialize($data_order);
        Cookie::queue('cart', $cart, 86400);
    }


    //DELETE CART
    public function delete_cart_all(){
        Cookie::queue('cart', '', -86400);
        return 'Success';
    }

    //DELETE CART ITEM
    public function deleteCartItem($variant_id){
        $data_order = decode_serialize (Cookie::get('cart'));
        foreach ($data_order as $key => $cart){
            if($cart['variant_id'] == $variant_id){
                unset($data_order[$key]);
            }
        }
        $cart = encode_serialize($data_order);
        Cookie::queue('cart', $cart, 86400);
        return 'Success';
    }

    //SHOW CHECKOUT
    public function getCheckout(){
        $order_cart = decode_serialize(Cookie::get('cart'));

        $districtsList = [];
        if(!$order_cart){
            return redirect('/');
        }
        $customer = [];
        if(Session::has('loginFrontend')){
            $customer_id = Session::get('customer_id_frontend');
            $customer = $this->m_customer->Get_customer_id( $customer_id);
            $districtsList = $this->m_districts->Get_districts_by_province_id($customer->customer_province);
        }

        $provincesList = $this->m_provinces->Get_all_provinces();
        return view('frontend.'.$this->templateActive.'.pages.cart.checkout',[
                'customer'      => $customer,
                'provincesList' => $provincesList,
                'districtsList' => $districtsList,
            ]);
    }

    //UPDATE CHECKOUT REGISTER
    public function postCheckout($request)
    {
        $data = $request->all();
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'email'     =>'required|email',
            'phone'     =>'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'address'   =>'required',
            'province' => 'required',
            'district' => 'required',
            'note'      =>'required',
        ],[

            'email.required'        => 'Email chưa nhập',
            'email.email'           => 'Email không đúng định dạng',
            'phone.required'        => 'Điện thoại chưa nhập',
            'phone.regex'           => 'Điện thoại không đúng, vui lòng nhập lại',
            'address.required'      => 'Địa chỉ chưa nhập',
            'province.required'      => 'Tỉnh chưa nhập',
            'district.required'      => 'Quận huyện chưa nhập',
            'note.required'         => 'Ghi chú chưa nhập',
        ]);
        if( $validator->fails() )
        {
            return redirect('cart/checkout')->withErrors($validator)->withInput();
        }

        /*-- End Validator --*/
        $email = isset($data['email']) ? $data['email'] : '';
        $fullname = isset($data['fullname']) ? $data['fullname'] : '';
        $phone = isset($data['phone']) ? $data['phone'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $gender = isset($data['gender']) ? $data['gender'] : '';
        $province = isset($data['province']) ? $data['province'] : '';
        $district = isset($data['district']) ? $data['district'] : '';
        $code_discount =  isset($data['code_discount']) ? $data['code_discount'] : null;
        $note = isset($data['note']) ? $data['note'] : '';

        $check_district = $this->m_districts->check_district($district, $province);
        if(!$check_district){
            $validator->getMessageBag()->add('','Tỉnh thành không hợp lệ');
            return redirect('cart/checkout')->withErrors($validator)->withInput();
        }

        $order_cart = decode_serialize(Cookie::get('cart'));
        if(!$order_cart){
            return redirect('/');
        }

        $customer_id = !empty(Session::get('customer_id_frontend')) ? Session::get('customer_id_frontend'): 0 ;

        /*Them vao order*/
        $variants =[];
        $product_temp = [];
        $total_price = 0;
        $total_temp = 0;
        foreach( $order_cart as $cart){
            $title = $cart['product_title'];
            $total_price = $cart['price'] * $cart['quantity'];
            $total_temp += $total_price;
            $arr = [
                'variant_id'    => $cart['variant_id'],
                'quantity'      => $cart['quantity'],
            ];
            array_push($variants,$arr);
            //Lấy ảnh
            $variant_image = $this->m_variant -> Get_variant_id($cart['variant_id'])->image;
            /*Thêm vào product_temp*/
            $product_temp_arr = [];
            $product_temp_arr['variant_id'] =   $cart['variant_id'];
            $product_temp_arr['product_id'] = $cart['product_id'];
            $product_temp_arr['variant_name'] = $cart['variant_meta'];
            $product_temp_arr['title'] =    $cart['product_title'];
            $product_temp_arr['slug'] =    $cart['product_slug'];
            $product_temp_arr['price'] = $cart['price'];
            $product_temp_arr['quantity_buy'] =  $cart['quantity'];
            $product_temp_arr['image'] =  $variant_image;
            //$product_temp_arr['quantity_refuned'] =
            $product_temp_id = $this->m_product_temp->Insert_product_temp ( $product_temp_arr);
            array_unshift($product_temp, $product_temp_id);
            /*end */
        }
        $cart_meta = promotionOrder($variants,$code_discount,$customer_id);
        $order_arr = [];
        $order_arr['user_id'] = '0';

        //$order_arr['ship_id'] = $ship_id;
        $order_arr['customer_id'] = $customer_id;
        $order_arr['customer_fullname'] = $fullname;
        $order_arr['order_content'] = $note;
        //$order_arr['order_discount'] = $order_discount; //đơn hàng giảm giá
        $order_arr['order_discount_notes'] = $cart_meta['title'];
        $order_arr['amount_order'] = $total_temp; //số tiền đơn hàng như bên cart
        $order_arr['amount_payment'] = $cart_meta['total']; //số tiền thanh toán như bên checkout
        //$order_arr['amount_refuned'] = $amount_refuned; //số tiền hoàn trả
        $order_arr['amount_discount'] = $cart_meta['discount_price'];
        //$order_arr['amount_ship'] = $amount_ship; //số tiền vận chuyển
        $order_arr['date_create'] = time();
        //$order_arr['date_payment'] = $date_payment; ngày thanh toán
        //$order_arr['ship_status'] = $ship_status; tình trạng vận chuyển
        $order_arr['order_status'] = '1'; //tình trạng đơn hàng
        //$order_arr['payment_type'] = $payment_type; loại thanh toán
        //$order_arr['payment_status'] = $payment_status; tình trạng thanh toán
        $order_id = $this->m_order->Insert_order_frontend($order_arr);
        /*End order*/

        /*Cap nhat order code*/
        $order_update = [];
        $order_update['order_id'] = $order_id;
        $order_update['order_code'] = $order_id+1000;
        $this->m_order->Update_order($order_update);
        /*End cap nhar*/

        /*Thêm vào qthis->m_order_relationships*/
        //get những product_temp_id đã thêm ở trên
        foreach($product_temp as $temp_id){
            $this->m_order_relationships->Insert_order_relationships($order_id,$temp_id );
        }
        /*End thêm*/

        /*Them vao order meta*/
        $province_name = $this->m_provinces->get_province_name($province);
        $district_name = $this->m_districts->get_district_name($district,$province);
        $shipping_info = [];
        $shipping_info['email'] = $email;
        $shipping_info['fullname'] = $fullname;
        $shipping_info['phone'] = $phone;
        $shipping_info['address'] = $address;
        $shipping_info['gender'] = $gender;
        $shipping_info['province'] = $province_name;
        $shipping_info['district'] = $district_name;
        $shipping_info['note'] = $note;

        $meta_key = 'shipping_info';
        $meta_value = encode_serialize($shipping_info);
        $this->m_order_meta->Insert_ordermeta($order_id, $meta_key, $meta_value);
        /*End order meta*/

        Cookie::queue('cart', $cart, -86400);
        /*Set order_id vào mảng*/
        $order_id_arr = !empty(Cookie::get('order_id_arr')) ? Cookie::get('order_id_arr'): [];
        array_push($order_id_arr,$order_id);
        Cookie::queue('order_id_arr', $order_id_arr, 3600);
        /* End xóa*/

        $this->send_mail_order($order_id);

        return redirect('cart/camon/'.$order_id);
    }

    public function get_discount_code( $code = '')
    {

        if(!$code){
            return false;
        }
        $customer_id    = Session::has('customer_id_frontend') ? Session::get('customer_id_frontend') : null;
        $cart_order = decode_serialize(Cookie::get('cart'));
        if($cart_order){
            $total = 0;
            $variants = [];
            $total_temp = 0;
            foreach($cart_order as $cart){
                $title = $cart['product_title'];
                $total_price = $cart['price'] * $cart['quantity'];
                $total_temp += $total_price;
                $arr = [
                    'variant_id'    => $cart['variant_id'],
                    'quantity'      => $cart['quantity'],
                ];
                array_push($variants,$arr);
            }

            $cart_meta = promotionOrder($variants,$code,$customer_id);

            $arr = [
                'title' =>$cart_meta['title'],
                'discount_price' => $cart_meta['discount_price'] <=0 ? '' : number_format($cart_meta['discount_price'], 0, ',', '.') ,
                'total' => $cart_meta['total'] <=0 ? 0 :  number_format($cart_meta['total'], 0, ',', '.'),
            ];
            return $arr;

        }
    }

    public function get_district($idProvince)
    {
        $districts = $this->m_districts->Get_districts_by_province_id($idProvince);
        $str = '<option value="">— Chọn Quận/Huyện —</option>';
        foreach( $districts as $district )
        {
            $str .= '<option value="'.$district->district_id.'">'.$district->district_name.'</option>';
        }
        echo $str;
    }

    public function get_camon( $order_id = '')
    {
       $order_id_arr = Cookie::get('order_id_arr');

        if(!in_array($order_id, $order_id_arr)){
            return redirect('/');
        }
        $order = $this->m_order->Get_order_id($order_id);
        $order_meta = $this->m_order_meta->Get_order_meta_id($order_id);
        $products = $this->m_order_relationships->Get_product_temp_order_id ( $order_id);
        if(!$order || !$order_meta || !$products){
            return redirect('/');
        }
        return view('frontend.'.$this->templateActive.'.pages.cart.camon',[
                'order' => $order,
                'order_meta' => $order_meta,
                'products'     => $products
        ]);
    }

    public function send_mail_order( $order_id = '' )
    {
        $order = $this->m_order->Get_order_id($order_id);
        $order_meta = $this->m_order_meta->Get_order_meta_id($order_id);
        $products = $this->m_order_relationships->Get_product_temp_order_id ( $order_id);
        $dataView = [];
        $dataView['order'] = $order;
        $dataView['order_meta'] = $order_meta;
        $dataView['products'] = $products;
        //Mail::send('frontend/'.Session::get('template').'/pages/contact/message',$dataView, function($message)
        Mail::send('frontend/'.$this->templateActive.'/pages/cart/send_mail',$dataView, function($message) use ($order_meta,$order)
        {
            $message->from('ocdang85tambaytaba@gmail.com', 'Admin');
            $message->subject('Xác nhận đơn hàng '.get_template_order_code($order->order_code));
            $message->to($order_meta['email'], 'Nguyễn Thân');
        });

        return 1;
    }
}
