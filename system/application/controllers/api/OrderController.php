<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*
 * Use Library of Laravel
 */
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\OrderRelationships;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantMeta;
use App\Models\ProductTemp;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Shipping;
use App\Models\Option;
use Validator;
use DB;
use Session;

class OrderController extends Controller
{
	public function index($item,$page){
		$page = $page-1;
		if($page<0){
			$page=0;
		}
		$skip = $item * $page;
		$option=new Option;
        $order_prefix=$option->getOptionValue_option('order_prefix');
        $order_suffix=$option->getOptionValue_option('order_suffix');
        $order = new Order;
        $order_list = $order->Get_order($item,$skip);
		return $order_list;
	}
	public function get($id){
		$order = new Order;
		$_order = $order->Get_order_id($id)->first();
		return $_order;
	}
	public function store(Request $request){
		$data = $request->all();
        // $data = ["variant_id"=> [
        //           "475",
        //           "510"
        //         ],
        //         "variant_number" => [
        //           "2",
        //           "3"
        //         ],
        //         "order_content"=> "abc",
        //         "shipping_province"=> "4",
        //         "shipping_district"=> "35",
        //         "customer_email" => "trandotheanh@gmail.com",
        //         "shipping_fullname" =>,
        //         "shipping_phone" =>,
        //         "shipping_address" =>,
        //         "shipping_district" =>,
        //         "shipping_province" =>,
        //         "shipping_id" => "0",
        //         "shipping_name" => "",
        //         "amount_shipping"=> "0",
        //         "shipping_custom"=> "",
        //         "amount_discount"=> "0",
        //         "amount_discount_notes"=> ""];
        return $data;
        $variant_id = isset($data['variant_id']) ? $data['variant_id'] : [];
        $variant_number = isset($data['variant_number']) ? $data['variant_number'] : [];
        $order_content = isset($data['order_content']) ? $data['order_content'] : '';
        $shipping_province = isset($data['shipping_province']) ? $data['shipping_province']: '';
        $shipping_district = isset($data['shipping_district']) ? $data['shipping_district']: '';
        $customer_email = isset($data['customer_email']) ? $data['customer_email']: '';
        $shipping_fullname = isset($data['shipping_fullname']) ? $data['shipping_fullname']: '';
        $shipping_phone = isset($data['shipping_phone']) ? $data['shipping_phone']: '';
        $shipping_address = isset($data['shipping_address']) ? $data['shipping_address']: '';
        $shipping_district = isset($data['shipping_district']) ? $data['shipping_district']: '';
        $shipping_province = isset($data['shipping_province']) ? $data['shipping_province']: '';
        $shipping_id = isset($data['shipping_id']) ? $data['shipping_id'] : 0;
        $shipping_name = isset($data['shipping_name']) ? $data['shipping_name'] : '';
        $amount_shipping = isset($data['amount_shipping']) ? $data['amount_shipping'] : 0;
        $shipping_custom = isset($data['shipping_custom']) ? $data['shipping_custom'] : '';
        $amount_discount = isset($data['amount_discount']) ? $data['amount_discount'] : 0;
        $amount_discount_notes = isset($data['amount_discount_notes']) ? $data['amount_discount_notes'] : '';

        $order = new Order;
        $order_meta= new Ordermeta;
        $order_relationships = new OrderRelationships;
        $product = new Product;
        $variant = new Variant;
        $product_temp = new ProductTemp;
        $provinces = new Provinces;
        $districts = new Districts;
        $shipping = new Shipping;
        $customer = new Customer;
        $variants = [];
        $product_id = [];
        $product_temp_id = [];

        $total_order = 0;
        $total_weight = 0;

        /* Check Cart */
        if(count($variant_id)==0){
            if($request->ajax()){
                return '{"Response":"False","Message":"Chưa có sản phẩm trong giỏ hàng"}';
            }
        }
        /*END */

        if($customer_email==''){
            return '{"Response":"False","Message":"Chưa chọn khách hàng"}';
        }

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
        /* Check quantity inventory */
        $check_quantity = $this->checkquantityCart($variant_id,$variant_number);
        if($check_quantity){
            return '{"Response":"False","Message":"sản phẩm đã hết hàng"}';
        }
         /*END */
         /* Check amount discount */
        if(!is_numeric($amount_discount)){
            return '{"Response":"False","Message":"Khuyến mãi phải là số"}';
        }
         /*END */

        if($shipping_custom==''){
            $_shipping = $shipping->Get_shipping_id($shipping_id);
            if($_shipping){
                $shipping_name = $_shipping->name;
            }
        }
        else{
            $_shipping_all = $shipping->Get_place_id();

            $shipping_data = [];
            $shipping_data['name'] = $shipping_name;
            $shipping_data['price'] = $amount_shipping;
            $shipping_data['type'] = 'price';
            $shipping_data['parent'] = $_shipping_all->shipping_id;
            $shipping_id = $shipping->Insert_shipping($shipping_data);
        }
        if($shipping_id==0 && $shipping_custom){
            $amount_shipping=0;
            $shipping_name='';
        }

      -
        /* Insert Product_Temp */
        $i=0;
        foreach ($variant_id as $value) {
            $arr = [];
            $arr= [
                'variant_id' => $value,
                'quantity'  => $variant_number[$i],
            ];
            array_push($variants,$arr);

            $_product_id = $variant->Get_variant_id($value)->product_id;
            array_push($product_id, $_product_id);

            $product_title = $product->Get_product_id($product_id[$i])->product_title;
            $product_slug = $product->Get_product_id($product_id[$i])->product_slug;
            $price = $variant->Get_variant_id($value)->price_new;
            $weight = $variant->Get_variant_id($value)->weight;
            $variant_image = $variant -> Get_variant_id($value)->image;
            $total_order+=$price*$variant_number[$i];
            $total_weight+=$weight*$variant_number[$i];

            $data_product_temp = [];
            $data_product_temp['variant_id'] = $value;
            $data_product_temp['product_id'] = $product_id[$i];
            $data_product_temp['variant_name'] = $this->getVariantTitleProduct($value);
            $data_product_temp['title'] = $product_title;
            $data_product_temp['slug'] =$product_slug;
            $data_product_temp['price'] =$price;
            $data_product_temp['quantity_buy'] = $variant_number[$i];
            $data_product_temp['quantity_refuned'] = 0;
            $data_product_temp['image'] = $variant_image;
            $temp_id = $product_temp->Insert_product_temp($data_product_temp);
            array_push($product_temp_id, $temp_id);

            $get_variant = $variant -> Get_variant_id($value);
            if($get_variant->tracking_policy==1){
                $inventory = $get_variant->inventory - $data['variant_number'][$i];
                $variant->Update_variant($value, [ 'inventory'=> $inventory ]);
            }

            $i++;
        }
        /* END */

        /* Insert Order */
        $data_order = [];
        $cart_meta = promotionOrder($variants,null,null);
        $amount_payment = $cart_meta['total'] - $amount_discount + $amount_shipping;
        $customer_id = $customer->Get_customer_email($customer_email)->customer_id;
        $cart_meta = promotionOrder($variants,null,null);
        $data_order['user_id'] = '123465798 123465798';
        $data_order['customer_id'] = $customer_id;
        $data_order['order_content'] = $order_content;
        $data_order['order_weight'] = $total_weight;
        $data_order['order_discount'] = $amount_discount;
        $data_order['amount_discount_notes'] = $amount_discount_notes;
        $data_order['order_discount_notes'] = $cart_meta['title'];
        $data_order['amount_order'] = $total_order; //số tiền đơn hàng như bên cart
        $data_order['amount_payment'] = $cart_meta['total']; //số tiền thanh toán như bên checkout
        //$order_arr['amount_refuned'] = $amount_refuned; //số tiền hoàn trả
        $data_order['amount_discount'] = $cart_meta['discount_price'];
        $data_order['amount_ship'] = $amount_shipping;
        $data_order['order_status'] = 1;
        $data_order['order_active'] = 1;
        $data_order['date_create'] = time();
        $order_id = $order->Insert_order($data_order);
        /* END */

        /* Insert Order Meta */
        $shipping_province_name = $provinces->get_province_name($shipping_province);
        $shipping_district_name = $districts->get_district_name($shipping_district,$shipping_province);
        $shipping_info = [];
        $shipping_info['email'] = $customer_email;
        $shipping_info['fullname'] = $shipping_fullname;
        $shipping_info['phone'] = $shipping_phone;
        $shipping_info['address'] = $shipping_address;
        $shipping_info['gender'] = 0;
        $shipping_info['province_id'] = $shipping_province;
        $shipping_info['province'] = $shipping_province_name;
        $shipping_info['district_id'] = $shipping_district;
        $shipping_info['district'] = $shipping_district_name;
        $meta_key = 'shipping_info';
        $meta_value = encode_serialize($shipping_info);
        $order_meta->Insert_ordermeta($order_id, $meta_key, $meta_value);

        $meta_key = 'shipping_name';
        $order_meta->Insert_ordermeta($order_id, $meta_key, $shipping_name);
        /* END */

        /* Insert Order Relationship*/
        foreach($product_temp_id as $temp_id){
            $order_relationships->Insert_order_relationships($order_id,$temp_id );
        }
        /*END*/
        /* Cap nhat order code*/
        $order_code = 1000+$order_id;
        $order_update = [];
        $order_update['order_id'] = $order_id;
        $order_update['order_code'] = $order_code;
        $order->Insert_order($order_update);
        /*END*/
        return '{"Response":"True","Message":"Thêm đơn hàng thành công"}';
		
	}
	public function destroy($idUser){
		
	}
	public function update($idUser,Request $request){
		
	}
    public function getVariantTitleProduct($variant_id)
    {
        $variant_meta = new VariantMeta;
        $variant_title='';
        $variant_meta_list=$variant_meta->Get_variant_meta_id($variant_id);

        foreach ($variant_meta_list as $value) {
            $variant_title.=$value->variant_value.' / ';
        }
        $variant_title=substr($variant_title, 0, -2);
        return trim($variant_title);
    }
    private function checkquantityCart($variant_id = array(), $quantity = array())
    {
        $variant = new Variant;
        $i = 0;
        foreach ($variant_id as $key => $value) {
            $_variant = $variant->Get_variant_id($value);
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
}