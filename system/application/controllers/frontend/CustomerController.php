<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Requests;
use App\Http\Controllers\frontend\FrontendController;

/*
 * Use Library of Laravel
 */
use Session;
use App\Models\Customer;
use App\Models\CustomerMeta;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\OrderRelationships;
use Validator;
use DB;

class CustomerController extends FrontendController
{
    /**
     * Class Constructor
     */
    function __construct(){
        parent::__construct();
    }
    public function index()
    {
        popupCart();

        //return view('frontend/'.Session::get('template').'/pages/customer/login');
        return view('frontend/'.$this->templateActive.'/pages/customer/login');
    }
    public function login(Request $request)
    {
        if( Session::has('loginFrontend') )
        {
            return redirect('/');
        }
        $data = $request->all();
        $customer = new Customer;
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Bạn cần phải nhập Email',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Bạn cần phải nhập Password',
        ]);
        if( $validator->fails() )
        {
            return redirect('customer/login')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/
        $email      = isset($data['email']) ? $data['email'] : '';
        $password   = md5 (isset($data['password']) ? $data['password'] : '');

        $check_customer = $customer -> Customer_login($email , $password );
        //$countAccount = count($check_customer);

        if( count($check_customer) == 1 )
        {
            Session::put('loginFrontend',1);
            Session::put('customer_id_frontend',$check_customer->customer_id);
            //Session::put('user_level_frontend',$check_customer->user_level);

            return redirect('/');
        }
        else
        {
            $validator->getMessageBag()->add('password','Tài khoản hoặc mật khẩu không đúng');
            return redirect('customer/login')->withErrors($validator)->withInput();
        }
    }

    public function logout()
    {
        Session::forget('loginFrontend');
        Session::forget('customer_id_frontend');
        //Session::forget('user_level_frontend');

        return redirect('/');
    }

    public function create()
    {
        if( Session::has('loginFrontend') )
        {
            return redirect('/');
        }
        //return view('frontend/'.Session::get('template').'/pages/customer/register');
        return view('frontend/'.$this->templateActive.'/pages/customer/register');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $customer = new Customer;
        $customer_meta = new CustomerMeta;
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:qm_customer,customer_email',
            'gender' => 'required|not_in:choise',

        ],[
            'name.required' => 'Bạn chưa nhập tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu cần có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận cần phải giống nhau',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            'gender.required' => 'Bạn phải chọn giới tính',
            'gender.not_in' => 'Bạn phải chọn giới tính',
        ]);

        if( $validator->fails() )
        {
            return redirect('customer/register')->withErrors($validator)->withInput();
        }

        /*-- End Validator --*/

        $time = time();
        $password = md5 (isset($data['password']) ? $data['password'] : '');
        $email = isset($data['email']) ? $data['email'] : '';
        $name = isset($data['name']) ? $data['name'] : '';
        $telephone = isset($data['telephone']) ? $data['telephone'] : '';
        $gender     = ( isset($data['gender']) && in_array($data['gender'],[1,2,3]) ) ? $data['gender'] : '1';
        $status = 1;



        /*Thêm vào customer*/
        $customer_arr = [];
        $customer_arr['customer_fullname'] = $name;
        $customer_arr['customer_pass'] = $password;
        $customer_arr['customer_email'] = $email;
        $customer_arr['customer_phone'] = $telephone;
        $customer_arr['customer_phone'] = $telephone;
        $customer_arr['customer_status'] = $status;
        $customer_arr['customer_gender'] = $gender;
        $customer_id = $customer -> Insert_customer($customer_arr);
        /*End cusoterm*/

        /*-- Insert Data To UserMeta --*/
        $user_id = Session::get('user_id');
        $time = time();
        $customer_meta -> Insert_customer_meta($customer_id,'register_time', $time);
        if($user_id){
            $customer_meta -> Insert_customer_meta($customer_id,'register_by', $user_id);
        }
        /*-- End Insert Data To UserMeta --*/

        return redirect('/');
    }

    //Cập nhật thông tin khách hàng
    public function edit()
    {
        if( !Session::has('loginFrontend') ){
            return redirect('/');
        }
        $m_customer = new Customer;
        $m_provice = new Provinces;
        $m_district = new Districts;

        $customer_id = Session::get('customer_id_frontend') ;
        $customer = $m_customer->Get_customer_id( $customer_id);
        if(!$customer){
            return redirect('/');
        }
        /*Lấy dữ liệu các tỉnh*/
        $provinces = $m_provice->Get_all_provinces();
        $customer_province = $customer->customer_province;
        $province_name = $m_provice->get_province_name($customer_province);
        $district_name = $m_district->get_district_name($customer->customer_district,$customer_province);
        $districts = $m_district->Get_districts_by_province_id($customer_province);
        return view('frontend/'.$this->templateActive.'/pages/customer/edit',[
                'customer'  => $customer,
                'provinces' => $provinces,
                'districts' => $districts,
                'province_name' => $province_name,
                'district_name' => $district_name,
            ]);
    }
    //Lưu cập nhật thông tin khách hàng
    public function update( Request $request)
    {
        $data = $request->all();
        $m_customer = new Customer;
        $m_provice = new Provinces;
        $m_district = new Districts;

        if( !Session::has('loginFrontend') ){
            return redirect('/');
        }

        $validator = Validator::make($data,[
            'fullname' => 'required',
            'province' => 'required',
            'district' => 'required',

        ],[
            'fullname.required' => 'Bạn chưa nhập tên',
            'province.required'      => 'Tỉnh chưa nhập',
            'district.required'      => 'Quận huyện chưa nhập',
        ]);

        if( $validator->fails() )
        {
            return redirect('customer/edit')->withErrors($validator)->withInput();
        }

        $customer_id = Session::get('customer_id_frontend');
        $fullname = isset($data['fullname']) ? $data['fullname'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $province = isset($data['province']) ? $data['province'] : '';
        $district = isset($data['district']) ? $data['district'] : '';
        $phone = isset($data['phone']) ? $data['phone'] : '';

        $check_district = $m_district->check_district($district, $province);
        if(!$check_district){
            $validator->getMessageBag()->add('','Tỉnh thành không hợp lệ');
            return redirect('customer/edit')->withErrors($validator)->withInput();
        }

        $customer_arr = [];
        $customer_arr['customer_id'] = $customer_id;
        $customer_arr['customer_fullname'] = $fullname;
        $customer_arr['customer_address'] = $address;
        $customer_arr['customer_province'] = $province;
        $customer_arr['customer_district'] = $district;
        $customer_arr['customer_phone'] = $phone;

        $m_customer->Update_customer($customer_arr);
        return redirect('customer/edit');
    }

    //Show thông tin khách hàng
    public function info()
    {
        if( !Session::has('loginFrontend') ){
            return redirect('/');
        }
        $m_customer = new Customer;
        $m_provice = new Provinces;
        $m_district = new Districts;
        $m_order = new Order;

        $customer_id = Session::get('customer_id_frontend');
        $customer = $m_customer->Get_customer_id( $customer_id);
        if(!$customer){
            return redirect('/');
        }

        $province_name = $m_provice->get_province_name($customer->customer_province);
        $district_name = $m_district->get_district_name($customer->customer_district,$customer->customer_province);
        $orders = $m_order->Get_order_customer_detail($customer_id);
        $products = array();
        foreach($orders as $order){
            $product_temp = DB::table('qm_order_relationships')->join('qm_product_temp','qm_product_temp.product_temp_id','=','qm_order_relationships.product_temp_id')->where('qm_order_relationships.order_id', $order->order_id)->get();
            $products[$order->order_id] = $product_temp;
        }
        return view('frontend/'.$this->templateActive.'/pages/customer/info',[
                'customer'      => $customer,
                'province_name' => $province_name,
                'district_name' => $district_name,
                'orders'        => $orders,
                'products'     => $products
            ]);
    }

    //Show chi tiết hóa đơn của khách hàng
    public function customer_order($order_code = '')
    {
        $m_customer = new Customer;
        $m_order = new Order;
        $m_order_relationships = new OrderRelationships;
        $m_order_meta = new OrderMeta;

        $customer_id = Session::get('customer_id_frontend');
        $order = $m_order->Get_order_code_customer( $order_code, $customer_id);
        if(!$order){
            return redirect('/');
        }
        $order_meta = $m_order_meta->Get_order_meta_id($order->order_id);
        $products = $m_order_relationships->Get_product_temp_order_id ( $order->order_id);
        return view('frontend/'.$this->templateActive.'/pages/customer/order_detail',[
                'order' => $order,
                'order_meta' => $order_meta,
                'products' => $products,
            ]);
    }


}
