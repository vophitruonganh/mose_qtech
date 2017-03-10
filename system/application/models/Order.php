<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\OrderMeta;

class Order extends Model
{
    public $table = 'qm_order';
    public $timestamps = false;

    public function Get_order($limit='',$skip=''){
        if($limit!=''){
            return Order::skip($skip)
                ->limit($limit)->get();
        }
        return Order::get();
    }
    //
    public function Count_order(){
        return Order::count();
    }
    public function Insert_order( $order_arr = array() ){
        // $data = [];
        // $data['order_code'] = $order_arr['order_code'];
        // $data['user_id'] = $order_arr['user_id'];
        // $data['post_id'] = $order_arr['post_id'];
        // $data['order_ems'] = $order_arr['order_ems'];
        // $data['order_content'] = $order_arr['order_content'];
        // $data['order_payment'] = $order_arr['order_payment'];
        // $data['order_status'] = $order_arr['order_status'];
        // $data['order_ship'] = $order_arr['order_ship'];
        // $data['date_create'] = $order_arr['date_create'];
        if(isset($order_arr['order_id'])){
            return Order::where('order_id', $order_arr['order_id'])->update($order_arr);
        }
        return Order::insertGetId($order_arr);
    }

    public function Update_order($order_arr = array()){
        $this->Insert_order( $order_arr );
    }
    //
    public function Search_order($search = '', $data = array() ){
        if($data['customer_id']){
            $order =Order::join('qm_customer','qm_customer.customer_id','=','qm_order.customer_id')
                         ->where('qm_order.customer_id',$data['customer_id'])
			             ->where(function($query) use ($search){
                             $query->where('order_code','like','%'.$search.'%')
                                   ->orwhere('qm_customer.customer_fullname','like','%'.$search.'%');
                         })
			             ->groupBy("order_code")
                         ->orderBy('date_create', 'desc')
			             ->get();
             return $order;
        }
        if($data['order_status']!='all'){
        	$order = Order::join('qm_customer','qm_customer.customer_id','=','qm_order.customer_id')
                         ->where(function($query) use ($search){
                             $query->where('order_code','like','%'.$search.'%')
                                   ->orwhere('qm_customer.customer_fullname','like','%'.$search.'%');
                         })
			             ->where('order_status',$data['order_status'])
                         ->orderBy('date_create', 'desc')
			             ->get();
             return $order;
        }

       $order = Order::join('qm_customer','qm_customer.customer_id','=','qm_order.customer_id')
                         ->where(function($query) use ($search){
                             $query->where('order_code','like','%'.$search.'%')
                                   ->orwhere('qm_customer.customer_fullname','like','%'.$search.'%');
                         })
                         ->where('order_status','<>','2')
                         ->orderBy('date_create', 'desc')
                         ->get();
        return $order;
    }
    //Đếm order theo trạng thái
	public function Count_order_status($order_status = 'all') {
		$allow_order_status = array('all',0,1,3,4,5);

        if(!in_array($order_status, $allow_order_status))
            return '0';
        if($order_status=='all'){
            return Order::where('order_status','<>','4')->where('order_status','<>','2')->count();
        }else {
            return Order::where('order_status',$order_status)->count();
        }
	}

    //
    public function Get_order_code($order_code = 0){
        return Order::where('order_code', $order_code);
    }
    public function Get_order_code_status($order_code = 0,$status){
        return Order::where('order_code', $order_code)->where('order_status',$status)->first();
    }

    public function Get_order_status($order_status){
        return Order::where('order_status',$status);
    }

	//Order status
	public function Action_order($checks, $order_action){
         if($order_action == 'trash'){
            foreach ($checks as $check)
            {
                Order::where('order_code',$check)->update(['order_status' => '4']);
            }
            return true;
         }

         if($order_action == 'restore'){
            $order_meta = new OrderMeta;
         	foreach($checks as $check){
                //Từ order_code lấy order_id
                $order_id = Order::where('order_code',$check)->first()->order_id;
                $value = $order_meta -> Get_order_meta_id($order_id);
                $old_order_status = isset($value['old_order_status']) ? $value['old_order_status'] : 1 ;
         		Order::where('order_code',$check)->update(['order_status' => $old_order_status]);
         	}
            return true;
         }

         if($order_action == 'delete'){
         	foreach($checks as $check){
                $this->Delete_order($check) ;
         	}
         }
        return false;
	}

    //
    public function Get_order_detail( $order_code = ''){
        return Order::
            join('qm_order_meta','qm_order.order_id','=','qm_order_meta.order_id')
            ->join('qm_customer','qm_customer.customer_id','=','qm_order.customer_id')
            ->where('om_key','=','order_detail')
            ->where('order_code','=',$order_code)

            ->get();
    }

    //
    public function Delete_order($order_code, $type = ''){
        $orders = $this->Get_order_code($order_code)->get();
        $order_meta = new Ordermeta;
        $order_relationships = new OrderRelationships;
        foreach ($orders as $order) {
             $order_meta->Delete_order_meta($order->order_id);
         }
         Order::where("order_code",$order_code)->delete();
         $order_relationships->Delete_order_relationships_code($order_code);
        if($type != 'update_order'){
            /*
              * ADD DATABASE LOG
              */
             addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$order_code");
             /* END SAVE DATABASE LOG */
        }

    }

    //Lấy hóa đơn cho bảng customer
    public function Get_order_customer($customer_id = '')
    {
        return Order::where('customer_id', $customer_id)->select('amount_payment','order_code','order_id')->groupBY('order_code')->orderBy('date_create','DESC')->get();
    }

    public function Count_order_customer($customer_id = '')
    {
        return Order::where('customer_id', $customer_id)->count();
    }

    public function Count_order_time($time_start = 0,$time_end = 9999, $order_status = '')
    {
        $query = Order::where('date_create','>', $time_start)->where('date_create','<', $time_end);
        if($order_status){
             $query->where('order_status',$order_status);
        }
        return $query->count();
    }

    public function Count_order_dashboard( $order_status = '', $shipping = '')
    {

        $query = Order::where('order_status',$order_status)->count();

        return $query;
    }

    public function Count_order_new()
    {
        return Order::where('order_active','0')->count();
    }

    /*Front end*/

    public function Get_max_order_code(){
        return Order::max('order_code');
    }

    public function Insert_order_frontend($data = array())
    {
         return Order::insertGetId($data);
    }

    public function Get_order_id($order_id = '')
    {
        return Order::where('order_id', $order_id)->first();
    }

    public function Get_order_customer_detail( $customer_id = '')
    {
        return Order::join('qm_order_meta','qm_order_meta.order_id','=','qm_order.order_id')->where('qm_order.customer_id',$customer_id)->paginate(5);
    }

    public function Get_order_code_customer( $order_code = '', $customer_id = '')
    {
        return Order::where('order_code', $order_code)->where('customer_id', $customer_id)->first();
    }

}
