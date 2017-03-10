<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerMeta;

class Customer extends Model
{
    public $table = 'qm_customer';
    public $timestamps = false;

    public function Count_customer(){
        return Customer::count();
    }

    //Thêm mới customer
    public function Insert_customer($customer_arr = array())
    {
        if(isset($customer_arr['customer_id'])){
            return Customer::where('customer_id', $customer_arr['customer_id'])->update($customer_arr);
        }
        return Customer::insertGetId($customer_arr);
    }

    //Cập nhật customer
    public function Update_customer($customer_arr = array())
    {
        return $this-> Insert_customer($customer_arr);
    }

    //Search customer
    public function Customer_search($search = '')
    {
        return Customer::select('customer_id','customer_email','customer_phone','customer_fullname')->where('customer_fullname','like', '%'.$search.'%')->orWhere('customer_phone','like', '%'.$search.'%')->orWhere('customer_email','like', '%'.$search.'%')->orderBy('customer_id','DESC')->get();
    }

    //Get customer theo id
    public function Get_customer_id( $customer_id = '' )
    {
        return Customer::where('customer_id',$customer_id)->first();
    }

    //Xóa customer theo id
    public function Delete_customer ( $customer_id = '')
    {
        return Customer::where('customer_id',$customer_id)->delete(); 
    }

    public function Get_customer_name( $customer_fullname = '')
    {
        return Customer::where('customer_fullname', $customer_fullname)->first();
    }

    public function Get_customer_email( $customer_email = '')
    {
        return Customer::where('customer_email', $customer_email)->first();
    }
    /*----frontend-----*/

    //Kiểm tra login customer
    public function Customer_login($customer_email = '', $customer_pass = '') 
    {
        return Customer::where('customer_email',$customer_email)->where('customer_pass',$customer_pass)->where('customer_status','1')->first();
    }

  
    public function Get_customer_list_order ( $search = '', $order_by = 'desc')
    {
        return Customer::join('qm_customer_meta','qm_customer_meta.customer_id','=','qm_customer.customer_id')
                           ->where(function($query) use ($search){
                                $query ->orwhere('qm_customer.customer_email','like','%'.$search.'%')->orWhere('qm_customer.customer_phone','like','%'.$search.'%')
                                ->orWhere('qm_customer.customer_fullname','like','%'.$search.'%');
                           })

                           ->groupBY('qm_customer.customer_id')
                           ->orderBY('qm_customer.customer_id',$order_by)
                           ->take(5)->get();
    }

   
}