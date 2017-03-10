<?php

namespace App\Http\Controllers\backend\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use App\Models\Shipping;
use App\Models\Provinces;
use App\Models\Districts;
use Validator;
use DB;
use Session;

class ShippingSettingController extends BackendController
{
    // public function __construct()
    // {
    //     parent::__construct();
        
    //     $userLevel = Session::get('user_level');
    //     if( $userLevel == 3 ) // Author
    //     {
    //         return redirect('admin')->send();
    //     }
    // }

    /*
    *    shippingList: danh sách khu vực vận chuyển
    *    store: tạo khu vực vận chuyển
    *    destroy: xóa khu vực vận chuyển
    *    store_shipping_rate: tạo phí vận chuyển
    *    create_shipping: tạo phí vận chuyển theo khu vực
    *    create_shipping_district: tạo phí vận chuyển theo quận huyện
    *    update: cập nhật phí vận chuyển
    *    update_shipping_rate: cập nhật phí vận chuyển cho khu vực
    *    update_shipping_district: cập nhật phí vận chuyển cho quận huyện
    *    destroy_shipping_rate: xóa phí vận chuyển
    */

    public function index()
    {
        $shipping = new Shipping;
        $optionObject = new Option;
        $provinces = new Provinces;
        $array_province = [];
        /* Create array province */
        array_push($array_province, ['id' => 0,'name' => 'Tất cả tỉnh thành']);
        $province_list = $provinces->Get_all_provinces();
        foreach ($province_list as $value) {
            array_push($array_province, ['id' => $value->province_id,'name' => $value->province_name]);
        }

        /* END Create array province */
        $array_shipping =[];
        $array_shipping = $this->shippingList();

        // return json_encode($array_shipping,JSON_UNESCAPED_UNICODE);
        return view('backend.pages.setting.shipping.shippingSetting',[
            'array_shipping' => $array_shipping,
            'provinces' => $array_province 
        ]);
    }
    private function shippingList(){
        $shipping = new Shipping;
        $array_shipping =[];
        $shipping_all_province = $shipping->Get_shipping_all_province();
        $shipping_province = $shipping->Get_shipping_all();
        $shipping_list = array_merge($shipping_all_province->toArray(),$shipping_province->toArray());
        foreach ($shipping_list as $shipping_p) {
            $array_shipping_child =[];
            $shipping_child = $shipping->Get_shipping_child($shipping_p['shipping_id']);
            foreach ($shipping_child as $shipping_c) {
                $array_shipping_district=[];
                $price_province_shipping_child=$shipping_c->price;
                $shipping_district = $shipping->Get_shipping_child($shipping_c->shipping_id);
                foreach ($shipping_district as $ship_d) {
                    array_push($array_shipping_district, 
                    [
                        'shipping_id' => $ship_d->shipping_id,
                        'place_id' => $ship_d->place,
                         'name' => $ship_d->name,
                         'price' => $ship_d->price,
                         'price_ship' => $ship_d->price+$price_province_shipping_child,
                         'status' => $ship_d->status,

                    ]
                );
                }
                array_push($array_shipping_child, 
                    [
                        'shipping_id' => $shipping_c->shipping_id,
                        'place_id' => $shipping_c->place,
                         'name' => $shipping_c->name,
                         'type' => $shipping_c->type,
                         'rate_from' => $shipping_c->rate_from,
                         'rate_to' => $shipping_c->rate_to,
                         'price' => $shipping_c->price,
                         'district' => $array_shipping_district
                    ]
                );
            }
            array_push($array_shipping, 
                [
                    'shipping_id' => $shipping_p['shipping_id'], 
                    'place_id' => $shipping_p['place'],
                    'shipping_name' => $shipping_p['name'],
                    'shipping_child' =>$array_shipping_child
                ]
            );
        }
        return $array_shipping;
    }
    // public function create()
    // {
    //     $provinces = new Provinces;
    //     $array_province = [];
    //     /* Create array province */
    //     array_push($array_province, ['id' => 0,'name' => 'Tất cả tỉnh thành']);
    //     $province_list = $provinces->Get_all_provinces();
    //     foreach ($province_list as $value) {
    //         array_push($array_province, ['id' => $value->province_id,'name' => $value->province_name]);
    //     }

    //     /* END Create array province */
    //     return view('backend.pages.setting.shipping.CreateshippingSetting',[
    //         'provinces' => $array_province 
    //     ]);
    // }
    public function store(Request $request){
        $data = $request->all();
        $shipping = new Shipping;
        $option = new Option;
        $district = new Districts;
        $provinces = new Provinces;
        $validator =Validator::make($data,[]);
        
        $province_shipping = isset($data['province_shipping']) ? $data['province_shipping'] : '';
        //price shipping default
        $shipping_price = $option->getOptionValue_option('shipping_price');
        /* Check province shipping */
        if($province_shipping==''){
            if($request->ajax()){
                return '{"Response":"False","Message":"Chưa chọn khu vực"}';
            }
            else{
                $validator->getMessageBag()->add('province_shipping','Chưa chọn khu vực');
                return redirect('admin/setting/shipping/create')->withErrors($validator)->withInput();
            }
        }
        if($province_shipping!=0){
            $check_province=$provinces->Get_provinces_id($province_shipping);
            if(!$check_province){
                if($request->ajax()){
                    return '{"Response":"False","Message":"Khu vực vận chuyển không hợp lệ"}';
                }
                else{
                    $validator->getMessageBag()->add('province_shipping','Khu vực vận chuyển không hợp lệ');
                    return redirect('admin/setting/shipping/create')->withErrors($validator)->withInput();
                }
            }

        }
        $check_shipping = $shipping->check_shipping_exists($province_shipping);
        if(!$check_shipping){
            if($request->ajax()){
                return '{"Response":"False","Message":"Khu vực vận chuyển đã tồn tại"}';
            }
            else{
                $validator->getMessageBag()->add('province_shipping','Khu vực vận chuyển đã tồn tại');
                return redirect('admin/setting/shipping/create')->withErrors($validator)->withInput();
            }
        }

        /* END Check province shipping */
        if($province_shipping!=0){
            $list_district = $district->Get_districts_by_province_id($province_shipping);
            

            // $data_shipping  = [];
            // // $data_shipping['name']=$array_province[$province_shipping];
            // $data_shipping['place']=$province_shipping;
            // $data_shipping['name']=$provinces->Get_provinces_id($province_shipping)->province_name;
            // $data_shipping['parent']=0;
            // $data_shipping['status']=1;
            // $shipping_id = $shipping->Insert_shipping($data_shipping);
            // /* END insert shipping */

            // /* insert shipping province */
            // $data_shipping_child = [];
            // $data_shipping_child['place'] = 0;
            // $data_shipping_child['name'] = 'Giao hàng tận nơi';
            // $data_shipping_child['price'] = $shipping_price;
            // $data_shipping_child['type'] = 'price';
            // $data_shipping_child['parent']=$shipping_id;
            // $data_shipping_child['status']=1;
            // $shipping_child_id = $shipping->Insert_shipping($data_shipping_child);
            // /* END insert shipping province*/

            /* insert shipping */
            $shipping_name = $provinces->Get_provinces_id($province_shipping)->province_name;
            $shipping_child_id = $this->create_shipping($province_shipping,$shipping_name,$shipping_price);
            /* END insert shipping */
            /* insert shipping district */
            $this->create_shipping_district($shipping_child_id,$list_district);
            /* END insert shipping district */
            $objdata = Array('Response'=>'False','Data'=>'');
            $array_shipping =[];
            $array_shipping = $this->shippingList();
            $view = view('backend.pages.setting.shipping.viewShippingSetting',[
                'array_shipping'         => $array_shipping,
            ]);
            $objdata['Data'] = urlencode($view);
            if($objdata['Data']){
                $objdata['Response'] = 'True';
            }
            return $objdata;
            
        }
        else{
            

            // $data_shipping  = [];
            // // $data_shipping['name']=$array_province[$province_shipping];
            // $data_shipping['place']=0;
            // $data_shipping['name']='Tất cả tỉnh thành';
            // $data_shipping['parent']=0;
            // $data_shipping['status']=1;
            // $shipping_id = $shipping->Insert_shipping($data_shipping);
            // /* END insert shipping */

            // /* insert shipping province */
            // $data_shipping_child = [];
            // $data_shipping_child['place'] = 0;
            // $data_shipping_child['name'] = 'Giao hàng tận nơi';
            // $data_shipping_child['price'] = $shipping_price;
            // $data_shipping_child['type'] = 'price';
            // $data_shipping_child['parent']=$shipping_id;
            // $data_shipping_child['status']=1;
            // $shipping_child_id = $shipping->Insert_shipping($data_shipping_child);
            // /* END insert shipping province*/

            /* insert shipping */
            $this->create_shipping(0,'Tất cả tỉnh thành',$shipping_price);
            /* END insert shipping */
            $objdata = Array('Response'=>'False','Data'=>'');
            $array_shipping =[];
            $array_shipping = $this->shippingList();
            $view = view('backend.pages.setting.shipping.viewShippingSetting',[
                'array_shipping'         => $array_shipping,
            ]);
            $objdata['Data'] = urlencode($view);
            if($objdata['Data']){
                $objdata['Response'] = 'True';
            }
            return $objdata;
        }
        
        // return redirect('admin/setting/shipping');
    }
    
    public function destroy($shipping_id)
    {
        $shipping=new Shipping;

        if($shipping->Delete_shipping($shipping_id)){
            // return redirect('admin/setting/shipping');
            return '{"Response":"True"}';
        }
        return '{"Response":"False"}';
    }
    
    public function store_shipping_rate(Request $request){
        $data = $request->all();
        $shipping = new Shipping;
        $district = new Districts;
        $rate_name = isset($data['rate_name']) ? $data['rate_name'] : '';
        $range_from = isset($data['range_from']) ? str_replace( ',', '', $data['range_from'] ) : 0;
        $range_to = isset($data['range_to']) ? str_replace( ',', '', $data['range_to'] ) : 0;
        $shipping_price = isset($data['shipping_price']) ? str_replace( ',', '', $data['shipping_price'] ) : 0;
        $shipping_id = isset($data['shipping']) ? $data['shipping'] : '';
        $shipping_criteria = isset($data['shipping_criteria']) ? $data['shipping_criteria'] : '';
        // Validator
        
        $validator = Validator::make($data,[
            'rate_name' => 'required',
            'range_from' => 'required|min:0',
            'range_to' => 'min:0',
            'shipping_price' => 'required|min:0'
        ],[
            'rate_name.required' => 'Tên Tỷ lệ vận chuyển không được bỏ trống',
            'range_from.required' => 'Hạn mức tối thiểu không được bỏ trống',
            // 'range_from.numeric' => 'Hạn mức tối thiểu phải là số',
            'range_from.min' => 'Hạn mức tối thiểu phải là số nguyên dương',
            // 'range_to.numeric' => 'Hạn mức tối đa phải là số',
            'range_to.min' => 'Hạn mức tối đa phải là số nguyên dương',
            'shipping_price.required' => 'Phí vận chuyển không được bỏ trống',
            // 'shipping_price.numeric' => 'Phí vận chuyển phải là số',
            'shipping_price.min' => 'Phí vận chuyển phải là số nguyên dương',
        ]);
        $shipping = $shipping->Get_shipping_id($shipping_id);
        if(!$shipping){
            return redirect('admin/setting/shipping');
        }
        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
            return redirect('admin/setting/shipping-rate/create/'.$shipping_id)->withErrors($validator)->withInput();
        }

        if(!is_numeric($range_from)){
            if($request->ajax()){
                return '{"Response":"False","Message":"Hạn mức tối thiểu phải là số"}';
            }
        }
        if(!is_numeric($range_to)){
            if($request->ajax()){
                return '{"Response":"False","Message":"Hạn mức tối đa phải là số"}';
            }
        }
        if($range_to!=0){
            if($range_to<$range_from){
                if($request->ajax()){
                return '{"Response":"False","Message":"Hạn mức tối đa phải lớn hơn hạn mức tối thiểu"}';
                }
                $validator->getMessageBag()->add('range_from','Hạn mức tối đa phải lớn hơn hạn mức tối thiểu');
                return redirect('admin/setting/shipping-rate/create/'.$shipping_id)->withErrors($validator)->withInput();
            }
        }
        if(!is_numeric($shipping_price)){
            if($request->ajax()){
                return '{"Response":"False","Message":"Phí vận chuyển phải là số"}';
            }
        }
        $check_shipping=$shipping->Get_shipping_id($shipping_id);
        if($check_shipping){
            $list_district = $district->Get_districts_by_province_id($check_shipping->place);
            $data_shipping_child = [];
            $data_shipping_child['place'] = 0;
            $data_shipping_child['name'] = $rate_name;
            $data_shipping_child['price'] = $shipping_price;
            $data_shipping_child['rate_from'] = $range_from;
            $data_shipping_child['rate_to'] = $range_to;
            $data_shipping_child['type'] = $shipping_criteria;
            $data_shipping_child['parent']=$shipping_id;
            $data_shipping_child['status']=1;
            $shipping_child_id = $shipping->Insert_shipping($data_shipping_child);
            $this->create_shipping_district($shipping_child_id,$list_district);
            // return redirect('admin/setting/shipping');
        }
        $objdata = Array('Response'=>'False','Data'=>'');
        $array_shipping =[];
        $array_shipping = $this->shippingList();
        $view = view('backend.pages.setting.shipping.viewShippingSetting',[
            'array_shipping'         => $array_shipping,
        ]);
        $objdata['Data'] = urlencode($view);
        if($objdata['Data']){
            $objdata['Response'] = 'True';
        }
        return $objdata;
        
    }
    public function update($shipping_id,Request $request){
        $data = $request->all();
        $shipping = new Shipping;
        $rate_id = isset($data['rate_id']) ? $data['rate_id'] : '';
        $rate_name = isset($data['rate_name']) ? $data['rate_name'] : '';
        $range_from = isset($data['range_from']) ? str_replace( ',', '', $data['range_from'] ) : 0;
        $range_to = isset($data['range_to']) ? str_replace( ',', '', $data['range_to'] ) : 0;
        $shipping_price = isset($data['shipping_price']) ? str_replace( ',', '', $data['shipping_price'] ) : 0;
        $shipping_criteria = isset($data['shipping_criteria']) ? $data['shipping_criteria'] : 'price';
        $district_shipping_id = isset($data['district_shipping_id']) ? $data['district_shipping_id'] : [];
        $district_shipping_price = isset($data['district_shipping_price']) ? $data['district_shipping_price'] : [];
        // Validator
        $validator = Validator::make($data,[
            'rate_name' => 'required',
            'range_from' => 'min:0',
            'range_to' => 'min:0',
            'shipping_price' => 'required|min:0'
        ],[
            'rate_name.required' => 'Tên Tỷ lệ vận chuyển không được bỏ trống',
            // 'range_from.numeric' => 'Hạn mức tối thiểu phải là số',
            'range_from.min' => 'Hạn mức tối thiểu phải là số nguyên dương',
            // 'range_to.numeric' => 'Hạn mức tối đa phải là số',
            'range_to.min' => 'Hạn mức tối đa phải là số nguyên dương',
            // 'shipping_price.numeric' => 'Phí vận chuyển phải là số',
            'shipping_price.required' => 'Phí vận chuyển không được bỏ trống',
            'shipping_price.min' => 'Phí vận chuyển phải là số nguyên dương',
        ]);
        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
            return redirect('admin/setting/shipping')->withErrors($validator)->withInput();
        }
        $check_shipping_province = $shipping->check_shipping_province_exists($shipping_id);
        
        if(!$check_shipping_province){
            if($request->ajax()){
                return '{"Response":"False","Message":"Khu vực vận chuyển không hợp lệ"}';
            }
            $validator->getMessageBag()->add('shipping_province','khu vực vận chuyển không hợp lệ');
                return redirect('admin/setting/shipping')->withErrors($validator)->withInput();
        }

        if($range_to!=0){
            if($range_to<$range_from){
                if($request->ajax()){
                    return '{"Response":"False","Message":"Hạn mức tối đa phải lớn hơn hạn mức tối thiểu"}';
                }
                $validator->getMessageBag()->add('range_from','Hạn mức tối đa phải lớn hơn hạn mức tối thiểu');
                return redirect('admin/setting/shipping')->withErrors($validator)->withInput();
            }
        }
        $array_shipping_criteria = ['price','weight'];
        if(!in_array($shipping_criteria, $array_shipping_criteria)){
            $shipping_criteria = 'price';
        }
       
        $data_shipping_rate = [];
        $data_shipping_rate['rate_id'] = $rate_id;
        $data_shipping_rate['rate_name'] = $rate_name;
        $data_shipping_rate['shipping_price'] = $shipping_price;
        $data_shipping_rate['range_from'] = $range_from;
        $data_shipping_rate['range_to'] = $range_to;
        $data_shipping_rate['shipping_criteria'] = $shipping_criteria;
        $this->update_shipping_rate($data_shipping_rate);

        $data_shipping_district = [];
        $data_shipping_district['rate_id'] = $rate_id;
        $data_shipping_district['district_shipping_id'] = $district_shipping_id;
        $data_shipping_district['district_shipping_price'] = $district_shipping_price;
        $this->update_shipping_district($data_shipping_district);

        $objdata = Array('Response'=>'False','Data'=>'');
        $array_shipping =[];
        $array_shipping = $this->shippingList();
        $view = view('backend.pages.setting.shipping.viewShippingSetting',[
            'array_shipping'         => $array_shipping,
        ]);
        $objdata['Data'] = urlencode($view);
        if($objdata['Data']){
            $objdata['Response'] = 'True';
        }
        return $objdata;
    }
    private function update_shipping_rate($data = array()){
        $shipping = new Shipping;
        $data_shipping_rate_update = [];
        $data_shipping_rate_update['shipping_id']=$data['rate_id'];
        $data_shipping_rate_update['name']=$data['rate_name'];
        $data_shipping_rate_update['price'] = $data['shipping_price'];
        $data_shipping_rate_update['rate_from'] = $data['range_from'];
        $data_shipping_rate_update['rate_to'] = $data['range_to'];
        $data_shipping_rate_update['type'] = $data['shipping_criteria'];
        $shipping->Insert_shipping($data_shipping_rate_update);

    }
    private function update_shipping_district($data = array()){
        $shipping = new Shipping;
        $rate_id = $data['rate_id'];
        $district_shipping_id = $data['district_shipping_id'];
        $district_shipping_price = $data['district_shipping_price'];

        $i=0;
        foreach ($district_shipping_id as $shipping_id) {
            $data_district_update = [];
            $data_district_update['shipping_id']=$shipping_id;
            $shipping_price = str_replace( ',', '', $district_shipping_price[$i] );
            $data_district_update['price']=$shipping_price;
            $shipping->Insert_shipping($data_district_update);
            $i++;
        }
        //district checked
        $shipping->update_status_district(1,$district_shipping_id);
        //district not checked
        $not_district_shipping = $shipping->get_district_not_checked($rate_id,$district_shipping_id);
        $shipping->update_status_district(0,$not_district_shipping);

    }
    public function destroy_shipping_rate($shipping_id)
    {
        $shipping=new Shipping;

        if($shipping->Delete_shipping_child($shipping_id)){
            return '{"Response":"True"}';
        }
        return '{"Response":"False"}';
    }
    public function create_shipping($place='',$shipping_name='',$shipping_price=''){
        $shipping = new Shipping;

        $data_shipping  = [];
        $data_shipping['place']=$place;
        $data_shipping['name']=$shipping_name;
        $data_shipping['parent']=0;
        $data_shipping['status']=1;
        $shipping_id = $shipping->Insert_shipping($data_shipping);
        /* END insert shipping */

        /* insert shipping province */
        $data_shipping_child = [];
        $data_shipping_child['place'] = 0;
        $data_shipping_child['name'] = 'Giao hàng tận nơi';
        $data_shipping_child['price'] = $shipping_price;
        $data_shipping_child['type'] = 'price';
        $data_shipping_child['parent']=$shipping_id;
        $data_shipping_child['status']=1;
        $shipping_child_id = $shipping->Insert_shipping($data_shipping_child);
        /* END insert shipping province*/
        return $shipping_child_id;

    }
    public function create_shipping_district($parent='',$array=''){
        $shipping = new Shipping;
        foreach ($array as $value) {
            $data_shipping_district = [];
            $data_shipping_district['place'] = $value->district_id;
            $data_shipping_district['name'] = $value->district_name;
            $data_shipping_district['price'] = 0;
            $data_shipping_district['parent']=$parent;
            $data_shipping_district['status']=1;
            $shipping->Insert_shipping($data_shipping_district);
        }

    }
}
