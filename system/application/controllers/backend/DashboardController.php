<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
//use Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;
use Validator;
class DashboardController extends BackendController
{
    /**
     * Class Constructor
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * anh long code
     */

    public function index()
    {
        $count_customer = $this->m_customer->Count_customer();
        $count_post = $this->m_post->Count_post_status('public','post');
        $count_product = $this->m_product->Count_product();
        $count_order = $this->m_order->Count_order();

        $count_order_status = [];
        $count_order_status['pending'] = $this->m_order->Count_order_dashboard(1); //Đơn hàng chưa thanh toán
        $count_order_status['paid'] = $this->m_order->Count_order_dashboard('0') ; //Đã thanh toán và chờ gửi hàng
        $count_order_status['be_refunded'] = $this->m_order->Count_order_dashboard(4) + $this->m_order->Count_order_dashboard(5) ; //Đơn hàng bị hoàn trả
        $count_order_status['cancel'] = $this->m_order->Count_order_dashboard(2); //Đơn hàng bị hủy
        $count_order_status['new'] = $this->m_order->Count_order_new();

        $list_top_product = $this->m_product_temp->Get_top_product_temp_order(5);

        if( isset($_COOKIE['un']) && isset($_COOKIE['up']) ){
            $domain = url('/');
            preg_match("/[^\.\/]+\.[^\.\/]+$/", $domain, $matches);

            setcookie('un', NULL, 1, '/', '.'.$matches[0]);
            setcookie('up', NULL, 1, '/', '.'.$matches[0]);
        }
        $time=getdate();
        return view('backend.pages.dashboard.index',
            [
                'count_customer' => $count_customer,
                'count_post' => $count_post,
                'count_product' => $count_product,
                'count_order' => $count_order,
                'count_order_status' => $count_order_status,
                'list_top_product' => $list_top_product
            ]);
        // return view('backend.pages.dashboard.list',
        //     [
        //         'time' => $time,
        //     ]);
    }

    public function turnover_year()
    {

        $year = isset($_GET['year']) ?  $_GET['year'] : getdate()['year'];
        //Kiểm tra hợp lệ của năm
        $check_date = checkdate('1','1',$year);
        if(!$check_date)
        {
           return redirect('admin');
        }
        //end
        $count_month = 12;
        $data = [];
        for ($i = 1; $i<=12; $i++)
        {
            $arr_order = [];
            /*Lấy số ngày trong tháng*/
            $time = strtotime("$year-$i-1");
            $count_day = date('t',$time);
            /*End*/

            //lấy thời gian đầu tháng
            $time_start = mktime( '0','0','0',$i ,'1', $year);
            // Lấy thời gian cuối tháng
            $time_end = mktime( '23','59','59',$i,$count_day , $year);
            //Lấy số hóa đơn trong tháng
            $count_order = $this->m_order->Count_order_time($time_start,$time_end);
            $arr_order['month'] = $i;
            $arr_order['value'] = $count_order;
            array_push($data, $arr_order);

        }
        return '{"Response":"True","Data":'.$data.'}';
    }
    public function statistics_order_month(Request $request)
    {
        $data = $request->all();
        $year = $data['year'];
        $month = $data['month'];

        //Kiểm tra ngày tháng hợp lệ ko
        $check_date = checkdate($month,'1',$year);
        if(!$check_date)
        {
           return redirect('admin/dashboard');
        }

        return view('backend.pages.dashboard.list_month',
            [
                'month' => $month,
                'year' => $year,
            ]);
    }

    public function statistics_order_year(Request $request)
    {
        $data = $request->all();
        $year = $data['year'];
        //Kiểm tra ngày tháng hợp lệ ko
        $check_date = checkdate('1','1',$year);
        if(!$check_date)
        {
           return redirect('admin/dashboard');
        }

        return view('backend.pages.dashboard.list_year',
            [
                'year' => $year,
            ]);
    }
    /**
     * get nam statictis
     */
    public function statistics_order_quarters(Request $request)
    {
        $data = $request -> all();
        $year = $data['year'];
        //Kiểm tra ngày tháng hợp lệ ko
        $check_date = checkdate('1','1',$year);
        if(!$check_date)
        {
           return redirect('admin/dashboard');
        }
        return view('backend.pages.dashboard.list_quarters',
            [
                'year' => $data['year']
            ]);
    }

    public function list_month($month){
        $data = $this->m_order->all();
        $year = getdate('year');

        //Lấy số ngày trong tháng
        $time = strtotime("$year-$month-1");
        $count_day = date('t',$time);
        $conut_order = [];
        // end số ngày

        $conut_order = [];
        $i = 1;
        $count_month = 12;// 12 tháng trong năm

        $i = 1;

        while($count_day>0){
            //lấy số giây đầu ngày, cuối ngày
            $start = mktime( '0','0','0',$month ,$i,$year);
            //return $start;
            $end = mktime( '23','59','59',$month,$i,$year);
            //Lấy số hóa đơn trong ngày đó
            $orders = $this->m_order->where('order_date','<',$end)
                                    ->where('order_date','>',$start)
                                    ->groupBy('order_code')
                                    ->get();

            $count_order[$i] = count($orders);
            $count_day -= 1;
            $i++;
        }
        return view('backend.pages.dashboard.list_month',
        [
            'count_order' => $count_order,
            'month' => $month,
            'year' => $year,
        ]);
    }
    /* Láy dữ liệu bỏ vào view list day*/
    public function data_month($year,$month){
        $check_date = checkdate($month,'1',$year);

        if(!$check_date){
           return redirect('admin/dashboard');
        }
        $str = '';
        $count_order = [];
        //Lấy số ngày trong tháng
        $time = strtotime("$year-$month-1");
        $count_day = date('t',$time);
        // end số ngày
        $i = 1;
        while($count_day>0){
            //lấy số giây đầu ngày, cuối ngày
            $start = mktime( '0','0','0',$month ,$i, $year);
            // /return $start;
            $end = mktime( '23','59','59',$month,$i , $year);
            //Lấy số hóa đơn trong ngày đó
            $orders = $this->m_order->where('order_date','<',$end)->where('order_date','>',$start)->groupBy('order_code')->get();
            $count_order[$i] = count($orders);
            $count_day -= 1;
            $i++;
        }
        $i = 1;
        foreach ($count_order as $key => $order)
        {
          $str .= '{x:'.$i.', y:'.$order.'},';

          // /echo $order;
          $i++;
        }

        $str = substr($str,0,-1);
        return '['.$str.']';
    }

    public function list_year($year)
    {
        $conut_order = [];
        $i = 1;
        $count_month = 12;// 12 tháng trong năm
        while($count_month>0)
        {
            //Lấy số ngày trong tháng
            $time = strtotime("$year-$i-1");
            $count_day = date('t',$time);
            //end số ngày
            //lấy số giây đầu ngày, cuối ngày
            $start = mktime( '0','0','0',$i ,'1', $year);
            // /return $start;
            $end = mktime( '23','59','59',$i,$count_day , $year);
            //Lấy số hóa đơn trong ngày đó
            $orders = $this->m_order->where('order_date','<',$end)->where('order_date','>',$start)->groupBy('order_code')->get();
            $count_order[$i] = count($orders);
            $count_month -= 1;
            $i++;
        }
        return view('backend.pages.dashboard.list_year',
        [
            'count_order' => $count_order,
            'year' => $year,
        ]);
    }

    public function data_year($year)
    {
        $conut_order = [];
        $i = 1;
        $str ='';
        $count_month = 12;// 12 tháng trong năm
        while($count_month>0){
            //Lấy số ngày trong tháng
            $time = strtotime("$year-$i-1");
            $count_day = date('t',$time);
            //end số ngày
            //lấy số giây đầu ngày, cuối ngày
            $start = mktime( '0','0','0',$i ,'1', $year);
            // /return $start;
            $end = mktime( '23','59','59',$i,$count_day , $year);
            //Lấy số hóa đơn trong ngày đó
            $orders = $this->m_order->where('order_date','<',$end)
                                    ->where('order_date','>',$start)
                                    ->groupBy('order_code')
                                    ->get();
            $count_order[$i] = count($orders);
            $count_month -= 1;
            $i++;
        }
        $i = 1;

        foreach($count_order as $order){
            $str.= '{ x:'. $i.', y:'.$order.' },';
            $i++;
        }
        $str = substr($str,0,-1);
        return '['.$str.']';
    }

    public function data_quarters($year)
    {
        $count_order = [];
        $i = 1;
        $str = '';
        $count_quarters = 4;// 4 quý năm
        while ($count_quarters)
        {
            $count = 0;
            //Lấy số hóa đơn 3 tháng trong quý
            for( $j=$i ; $j<$i+3 ; $j++ )
            {
                $time = strtotime("$year-$j-1");
                //Lấy số ngày trong tháng j
                $count_day = date('t',$time);
                //lấy số giây đầu ngày, cuối ngày
                $start = mktime( '0','0','0',$j ,'1', $year);
                // /return $start;
                $end = mktime( '23','59','59',$j,$count_day , $year);
                $orders = $this->m_order->where('order_date','<',$end)
                                        ->where('order_date','>',$start)
                                        ->groupBy('order_code')
                                        ->get();
                $count += count($orders);
            }

            $count_order[$i] = $count;
            $i += 3;
            $count_quarters--;
        }

        $i =  1;

        foreach($count_order as $order){
            $str .= '{ x:'. $i.', y:'.$order.' },';
            $i++;
        }

        $str = substr($str,0,-1);
        return '['.$str.']';
    }
}
