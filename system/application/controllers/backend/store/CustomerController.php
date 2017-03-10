<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Customer;
use App\Models\CustomerMeta;
use App\Models\Order;
use App\Models\CustomerRelationships;
use App\Models\Ordermeta;
use App\Models\Taxonomy;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Provinces;
use App\Models\Districts;

use Validator;
use DB;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerController extends BackendController
{

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
        $data = $request->all();
        $customer = new Customer;
        $pageNo = $request->input('page',1);

        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $type = isset($data['type']) ? $data['type'] : '';
        $search = isset($data['search']) ? $data['search'] : '';
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }
        if($type_request =='ajax'){
            if($select_action)
            {
                $count = count($check);
                if($select_action=='edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/customer/edit/'.$check[0]));
                    return $output;
                }
                if($select_action=='trash' && $count){
                    foreach($check as $v){
                        $this-> destroy($v);
                    }
                }
            }
            $data_view = array();
            $data_view['search'] = $search;
            $data_view['select_action'] = $select_action;

            $customer_list = $customer->Customer_search($search );
            $customer_info = $this->get_customer_info_relationships( $customer_list);
            $customers = $this->paginate($customer_info, 10,$pageNo);
            return $this->customerView($customers,$data_view);
        }else{
            if($select_action){
                $count = count($check);
                if($select_action=='edit' && $count){
                    return redirect('admin/customer/edit/'.$check[0]);
                }
            }
            $customer_list = $customer->Customer_search($search );
            $customer_info = $this->get_customer_info_relationships( $customer_list);
            $customer_page = [];
            if($search){
                 $customer_page['search'] = $search;
            }
            $customers = $this->paginate($customer_info, 10,$pageNo);
            return view('backend.pages.store.customer.listCustomer',[
                'customers' => $customers->appends($request->input()),
                'search' => $search,
                'pagination'    => $customer_page,
            ]);
        }
    }

    private function get_customer_info_relationships( $customer_list = array())
    {
        $order = new Order;
        $order_meta = new Ordermeta;
        $customer_info = [];
        if(count($customer_list)>0){
            foreach ($customer_list as $v){
                //Đếm số hóa đơn của customer_id

                $order_list = $order->Get_order_customer($v->customer_id);
                $count_order = count($order_list);
                //Lấy hóa đơn mới nhất
                //Lấy giá hóa đơn
                $price = 0;
                $order_new = 0;
                if(count($order_list)>0){
                    $order_new = $order_list[0]['order_code'];
                    $order_id = $order_list[0]['order_id'];
                    foreach($order_list as $c){
                        $price += $c->amount_payment;
                        // $order_id_list = $order->Get_order_code($c->order_code)->select('product_id','order_id')->get();
                        // foreach ($order_id_list as $t) {
                        //     $price += $meta_value[$t->product_id]['sub_total'] * $meta_value[$t->product_id]['quantity'];
                        // }
                    }
                }
                
                //End lấy giá
                $arr = array('customer_id'=>$v->customer_id,'customer_fullname'=>$v->customer_fullname,'customer_phone'=>$v->customer_phone,'customer_email'=>$v->customer_email,'count_order'=> $count_order, 'order_new'=> $order_new,'order_id' => $order_id , 'price'=>$price);
                array_push($customer_info,$arr);
            }    
        }
        return $customer_info;
    }
    private function customerView($customers , $data_view = array())
    {
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.store.customer.listViewCustomer',[
                'customers'         => $customers,
                'search'        => $data_view['search'],
            ]);
        $objdata['Page'] = urlencode($customers->render());
        
        if($data_view['search']){
            $objdata['Page'] = urlencode($customers->appends(array('search' => $data_view['search']))->render());
        }else {
            $objdata['Page'] = urlencode($customers->render());
        }
        $objdata['List'] = urlencode($view);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'trash'){
            $objdata['Message'] = 'Xóa khách hàng thành công!';
        }
        return $objdata;
    }
    
    public function create()
    {
        $taxonomy = new Taxonomy;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;

        $customer_groups = $taxonomy->Get_taxonomy_type('customer_group');
        $provinces = $provincesObject->Get_all_provinces();
        $districts = [];
        if( Session::has('province') )
        {
            $districts = $districtsObject->Get_districts_by_province_id(Session::get('province'));
        }

        return view('backend.pages.store.customer.createCustomer',[
            'customer_groups' => $customer_groups,
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        
        $customer = new Customer ;
        $taxonomy = new Taxonomy;
        $customer_meta = new CustomerMeta ;
        $customer_relationships = new CustomerRelationships;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;

        Session::flash('province',$data['provinces']);

        /*-- Validator --*/
        $validator = Validator::make($data,[
            'fullname' => 'max:40',
            'phone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|between:8,11',
            'password' => 'between:8,50|confirmed',
            'email' => 'email|unique:qm_customer,customer_email',
        ],[
            'fullname.max' => 'Tên không được quá 40 kí tự',
            'phone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
            'phone.between' => 'Số điện thoại phải từ 8 đến 11 số',
            'password.between' => 'Mật khẩu có phải từ 8 đến 50 kí tự',
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận cần phải giống nhau',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            
        ]);

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }else {
                return redirect('admin/customer/create')->withErrors($validator)->withInput();
            }
        } 
        // Kiem tra 1 trong 3 truong co duoc nhap ko
        if( !$data['fullname'] && !$data['phone']  && !$data['email'] ){
            $validator->getMessageBag()->add('','Bạn phải nhập ít nhất email, tên hoặc số điện thoại');
            if($request->ajax()){
                return '{"Response":"False","Message":"Bạn phải nhập ít nhất email, tên hoặc số điện thoại"}';
            }else {
                return redirect('admin/customer/create')->withErrors($validator)->withInput();
            }
        }

        //Kiem tra nhom khach hang
        if($data['level']){
            $check_level = $taxonomy -> Get_taxonomy_id('customer_group', $data['level']);
            if(!$check_level){
                $validator->getMessageBag()->add('','Nhóm khách hàng không đúng');
                if($request->ajax()){
                    return '{"Response":"False","Message":"Nhóm khách hàng không đúng"}';
                }else {
                    return redirect('admin/customer/create')->withErrors($validator)->withInput();
                }
            }
        }

        // Check province
        $data['provinces'] = isset($data['provinces']) ? $data['provinces'] : 0;
        $get_provinces_id = $provincesObject->Get_provinces_id($data['provinces']);
        if( $get_provinces_id == null )
        {
            $validator->getMessageBag()->add('provinces','Vui lòng chọn Tỉnh/Thành phố');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Tỉnh/Thành phố"}';
            }else {
                return redirect('admin/customer/create')->withErrors($validator)->withInput();
            }
        }

        // Check district
        $data['districts'] = isset($data['districts']) ? $data['districts'] : 0;
        $check_district = $districtsObject->Check_district($data['districts'],$data['provinces']);
        if( $check_district == null )
        {
            $validator->getMessageBag()->add('districts','Vui lòng chọn Quận/Huyện');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Quận/Huyện"}';
            }else {
                return redirect('admin/customer/create')->withErrors($validator)->withInput();
            }
        }

        /*-- End Validator --*/
        if(strlen($data['password'])==0){
            $password = '';
            $customer_status = 0;
        }else{
            $password = md5($data['password']) ;
            $customer_status = 1;
            //Trạng thái chưa kích hoạt buộc phải có email
            if(!$data['email']){
                $validator->getMessageBag()->add('','Bạn cần nhập email để tạo tài khoản');
                if($request->ajax()){
                    return '{"Response":"False","Message":"Bạn cần nhập email để tạo tài khoản"}';
                }else {
                    return redirect('admin/customer/create')->withErrors($validator)->withInput();
                }
            }
        }
        $gender_arr = [ '0', '1', '2', '3'];
        if(!in_array($data['gender'], $gender_arr)){
            $data['gender'] = 0;
        }
        $email_advertising = isset($data['email_advertising'])? '1' : '0';
        //Thêm vào customer
        $customer_arr = [];
        $customer_arr['customer_fullname'] = strip_tags(trim($data['fullname'])) ;
        $customer_arr['customer_phone'] = $data['phone'] ;
        $customer_arr['customer_email'] = $data['email'] ;
        $customer_arr['email_advertising'] = $email_advertising;
        $customer_arr['customer_pass'] = $password ;
        $customer_arr['customer_address'] = $data['address'] ; 
        $customer_arr['customer_province'] = $data['provinces'] ; 
        $customer_arr['customer_district'] = $data['districts'] ; 
        $customer_arr['customer_gender'] = $data['gender'] ; 
        $customer_arr['customer_status'] = $customer_status; 
        $customer_arr['customer_notes'] = $data['notes']; 
        $customer_id = $customer -> Insert_customer( $customer_arr );

        //Thêm vào customer meta
        $user_id = Session::get('user_id');
        $time = time();
        $customer_meta -> Insert_customer_meta($customer_id,'register_time', $time);
        if($user_id){
            $customer_meta -> Insert_customer_meta($customer_id,'register_by', $user_id);
        }
        //Them vao nhom khach hang
        if($data['level']){
            $customer_relationships -> Insert_customer_relationships ($data['level'], $customer_id );
            //Đếm số customer thuộc vè nhóm khách hàng đã chọn
            $count = $customer_relationships->Count_taxonomy_relationships( $data['level']);
            $taxonomy -> Update_taxonomy_count($data['level'],$count);
        }
        if($request->ajax()){
            return '{"Response":"True","Redirect":"'.url('admin/customer/edit/'.$customer_id).'"}';
        }else {
            return redirect('admin/customer/edit/'.$customer_id);
        } 
    }
    
    public function edit($customer_id)
    {
        $userObject = new User;
        $userMetaObject = new Usermeta;
        $taxonomy = new Taxonomy;
        $customer_relationships = new CustomerRelationships;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;

        /////////
        $_customer = new Customer;
        $_customer_meta = new CustomerMeta;

        $customer = $_customer ->Get_customer_id( $customer_id) ;
        if(count($customer)==0){
            return redirect('admin/customer');
        }

        $provinces = $provincesObject->Get_all_provinces();
        $customer_province = $customer->customer_province;
        if( Session::has('province') ) $customer_province = Session::get('province');
        $districts = $districtsObject->Get_districts_by_province_id($customer_province);

        //$customer_meta = $_customer_meta-> Get_customer_id( $customer_id) ;
        //Lấy nhóm khach hàng
        $_customer_group = $customer_relationships->Get_customer_relationship($customer_id);
        $customer_group = isset($_customer_group) ? $_customer_group->taxonomy_id : 0; 
        //End lấy nhóm
        $list_customer_groups = $taxonomy->Get_taxonomy_type('customer_group');
        
        return view('backend.pages.store.customer.editCustomer',[
            'customer' => $customer,
            'list_customer_groups' => $list_customer_groups,
            'customer_group' => $customer_group,
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }
    
    public function update($customer_id,Request $request)
    {
        $data = $request->all();
        $customer = new Customer;
        $userMetaObject = new Usermeta;
        $customer_relationships = new CustomerRelationships;
        $taxonomy = new Taxonomy;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;

        $check_customer = $customer->Get_customer_id( $customer_id) ;
        if(!$check_customer){
            return redirect('admin/customer');
        }

        Session::flash('province',$data['provinces']);
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'fullname' => 'max:40',
            'phone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|between:8,11',
            'password' => 'between:8,50|confirmed',
            'email' => 'email|unique:qm_customer,customer_email,'.$customer_id.',customer_id',
            // 'provinces' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            // 'districts' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'
            
        ],[
            'fullname.max' => 'Tên không được quá 40 kí tự',
            'phone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
            'phone.between' => 'Số điện thoại phải từ 8 đến 11 số',
            'password.between' => 'Mật khẩu có phải từ 8 đến 50 kí tự',
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận cần phải giống nhau',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            // 'provinces.regex' => 'Tỉnh thành không hợp lệ',
            // 'districts.regex' => 'Quận huyện không hợp lệ',
            
        ]);
        
       if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }else {
                return redirect('admin/customer/edit'.$customer_id)->withErrors($validator)->withInput();
            }
        } 
        // Kiem tra 1 trong 3 truong co duoc nhap ko
        if( !$data['fullname'] && !$data['phone']  && !$data['email'] ){
            $validator->getMessageBag()->add('','Bạn phải nhập ít nhất email, tên hoặc số điện thoại');

            if($request->ajax()){
                return '{"Response":"False","Message":"Bạn phải nhập ít nhất email, tên hoặc số điện thoại"}';
            }else {
                return redirect('admin/customer/edit'.$customer_id)->withErrors($validator)->withInput();
            }
        }

        // Check province
        $data['provinces'] = isset($data['provinces']) ? $data['provinces'] : 0;
        $get_provinces_id = $provincesObject->Get_provinces_id($data['provinces']);
        if( $get_provinces_id == null )
        {
            $validator->getMessageBag()->add('provinces','Vui lòng chọn tỉnh/thành phố');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Tỉnh/Thành phố"}';
            }else {
                return redirect('admin/customer/edit'.$customer_id)->withErrors($validator)->withInput();
            }
        }

        // Check district
        $data['districts'] = isset($data['districts']) ? $data['districts'] : 0;
        $check_district = $districtsObject->Check_district($data['districts'],$data['provinces']);
        if( $check_district == null )
        {
            $validator->getMessageBag()->add('districts','Vui lòng chọn quận/huyện');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Quận/Huyện"}';
            }else {
                return redirect('admin/customer/edit'.$customer_id)->withErrors($validator)->withInput();
            }
        }

        //Kiem tra nhom khach hang
        if($data['level']){
            $check_level = $taxonomy -> Get_taxonomy_id('customer_group', $data['level']);
            if(!$check_level){
                $validator->getMessageBag()->add('','Nhóm khách hàng không đúng');
                if($request->ajax()){
                    return '{"Response":"False","Message":"Nhóm khách hàng không đúng"}';
                }else {
                    return redirect('admin/customer/edit'.$customer_id)->withErrors($validator)->withInput();
                }
            }
        }
        
        $customer_arr = [];

        $password = '';
        if(strlen($data['password'])>0){
             $password = md5($data['password']);
            //Kiểm tra trạng thái mật khẩu cũ
            if(strlen($check_customer->customer_pass)==0){
                //Cập nhật trạng thái khách hàng
                $customer_status = 1;
                //Tài khoản chưa kích hoạt buộc phải có email
                if(!$data['email']){
                    $validator->getMessageBag()->add('','Bạn cần nhập email để tạo tài khoản');
                    if($request->ajax()){
                        return '{"Response":"False","Message":"Bạn cần nhập email để tạo tài khoản"}';
                    }else {
                        return redirect('admin/customer/edit'.$customer_id)->withErrors($validator)->withInput();
                    }
                }
            }
            //Else giữ nguyên trạng thái cũ
        }
        $gender_arr = [ '0', '1', '2', '3'];
        if(!in_array($data['gender'], $gender_arr)){
            $data['gender'] = 0;
        }
        $email_advertising = isset($data['email_advertising'])? '1' : '0';

        if($password){
            $customer_arr['customer_pass'] = $password;
            $customer_arr['customer_status'] = $customer_status;

        }
        $customer_arr['customer_id'] = $customer_id;
        $customer_arr['customer_fullname'] = strip_tags(trim($data['fullname'])) ;
        $customer_arr['customer_phone'] = $data['phone'] ;
        $customer_arr['customer_email'] = $data['email'] ;
        $customer_arr['email_advertising'] = $email_advertising;
        $customer_arr['customer_address'] = $data['address'] ; 
        $customer_arr['customer_province'] = $data['provinces'] ; 
        $customer_arr['customer_district'] = $data['districts'] ; 
        $customer_arr['customer_gender'] = $data['gender'] ; 
        $customer_arr['customer_notes'] = $data['notes']; 
        $customer->Update_customer( $customer_arr );

        //Thêm vào customer meta-------Đang xây dựng
        // $user_id = Session::get('user_id');
        // $time = time();
        // $customer_meta -> Insert_customer_meta($customer_id,'register_time', $time);
        // if($user_id){
        //     $customer_meta -> Insert_customer_meta($customer_id,'register_by', $user_id);
        // }
        //Nhóm khách hàng
        $old_customer_group = $customer_relationships -> Get_customer_relationship($customer_id);

        if($old_customer_group){
            $customer_relationships->Delete_customer_relationships($customer_id);
            $count = $customer_relationships->Count_taxonomy_relationships( $old_customer_group->taxonomy_id);
            $taxonomy -> Update_taxonomy_count($old_customer_group->taxonomy_id,$count);
        }
        if($data['level'])
        {
            $customer_relationships -> Insert_customer_relationships ($data['level'], $customer_id );
            //Đếm số customer thuộc vè nhóm khách hàng đã chọn
            $count = $customer_relationships->Count_taxonomy_relationships( $data['level']);
            $taxonomy -> Update_taxonomy_count($data['level'],$count);
        }
        //End nhóm khách hàng

        if($request->ajax()){
            return '{"Response":"True","Redirect":"'.url('admin/customer/edit/'.$customer_id).'"}';
        }else {
            return redirect('admin/customer/edit/'.$customer_id);
        } 
        
    }
    
    public function destroy($customer_id = '')
    {
        $customer = new Customer;
        $customer_meta = new CustomerMeta;
        $taxonomy = new Taxonomy;
        $customer_relationships = new CustomerRelationships;
        $check = $customer -> Get_customer_id( $customer_id);
        if(!$check){
            return false;
        }
        $customer -> Delete_customer($customer_id );
        $customer_meta-> Delete_customer_meta( $customer_id);
        $customer_group = $customer_relationships->Get_customer_relationship($customer_id);
        if($customer_group){
            //Xóa trong customer relationships;
            $customer_relationships->Delete_customer_relationships($customer_id);
            $count = $customer_relationships->Count_taxonomy_relationships( $customer_group->taxonomy_id);
            $taxonomy -> Update_taxonomy_count($customer_group->taxonomy_id,$count);
        }
    }
}
