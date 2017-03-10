<?php
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use DB;
use Session;

class TurnoverController extends BackendController{
	public function index(){
		$time=getdate();
        return view('backend.pages.turnover.index',
        [
            'time' => $time,
        ]);
	}

	public function changeMonth(Request $request){
		$data  = $request->all();
		$month = $data['month'];
		$year  = $data['year'];
		$check_date = checkdate($month, '1', $year);
		if(!$check_date)
		{
			 return redirect('admin/turnover');
		}
		return view('backend.pages.turnover.turnover_month',
			[
				'month' => $month,
				'year'  => $year
			]);
	}

	public function changeYear(Request $request){
		$data  = $request->all();
		$year  = $data['year'];
		$check_date = checkdate('1', '1', $year);
		if(!$check_date){
			 return redirect('admin/turnover');
		}
		return view('backend.pages.turnover.turnover_year',
		[
			'year'  => $year
		]);
	}

	public function changeQuarters(Request $request){
		$data  = $request->all();
		$year  = $data['year'];
		$check_date = checkdate('1', '1', $year);
		if(!$check_date)
		{
			 return redirect('admin/turnover');
		}
		return view('backend.pages.turnover.turnover_quarters',
			[
				'year'  => $year
			]);
	}

	public function data_month($month ='1' ,$year ='2016',$order_status='0'){
		$check_date = checkdate($month,'1',$year);
        if(!$check_date){
           return redirect('admin/turnover');
        }
        //Lấy số ngày trong tháng
        $time = strtotime("$year-$month-1");
        $count_day = date('t',$time);
        // end số ngày

        $i=1; //Lấy ngày đầu tiên
        $total_all = [];
        while( $count_day>0 )
        {
        	//lấy số giây đầu ngày, cuối ngày
            $start = mktime( '0','0','0',$month ,$i, $year);

            // /return $start;
            $end = mktime( '23','59','59',$month,$i , $year);
            $orders = $this->m_order
                             ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
                             ->select('qm_ordermeta.om_value')
                             ->where('qm_order.order_date','>',$start)
                             ->where('qm_order.order_date','<',$end)
                             ->where('qm_ordermeta.om_key','order_detail')
                             ->where('qm_order.order_status',$order_status)
                             ->get();
		    //Kiểm tra xem ngày hôm đó có hoa đơn ko
		    $total =0;
            if(count($orders)>0)
            {
            	foreach($orders as  $order)
            	{
            		$order_metas = decode_serialize($order->om_value);
            		foreach ($order_metas as $key => $order_meta)
            		{
            			$total += $order_meta['quantity'] * $order_meta['sub_total'];
            		}
            	}
            }
            $total_all[$i] = $total;
        	$count_day -= 1;
        	$i++;

        }
        $str = '';
        foreach ($total_all as $key => $data)
        {
          	$str .= '{x:'.$key.', y:'.$data.'},';
        }
        $str = substr($str,0,-1);
        return '['.$str.']';
	}

	public function data_year($year = '2016', $order_status = '0')
	{
		$check_date = checkdate('1','1',$year);
        if(!$check_date)
        {
           return redirect('admin/turnover');
        }
        $i = 1;
        $total_all = [];
        $count_month = 12;
        while ($count_month >0)
        {
        	//Lấy số ngày trong tháng
            $time = strtotime("$year-$i-1");
            $count_day = date('t',$time);
            //end lấy số ngày

            //Lây ngày đầu tháng
            $start = mktime( '0','0','0',$i ,'1', $year);

            //Lấy ngày cuối tháng
            $end = mktime( '23','59','59',$i,$count_day , $year);

            $orders = $this->m_order
                             ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
                             ->select('qm_ordermeta.om_value')
                             ->where('qm_order.order_date','>',$start)
                             ->where('qm_order.order_date','<',$end)
                             ->where('qm_ordermeta.om_key','order_detail')
                             ->where('qm_order.order_status',$order_status)
                             ->get();
            $total = 0;
            if(count($orders)>0)
            {
            	foreach($orders as $order)
            	{
            		$order_metas = decode_serialize($order->om_value);
            		foreach ($order_metas as $key => $order_meta)
            		{
            			$total += $order_meta['quantity'] * $order_meta['sub_total'];
            		}
            	}
            }
            $total_all[$i] = $total;
        	$i++;
        	$count_month -= 1;
        }
        $str = '';
        foreach ($total_all as $key => $data)
        {
          	$str .= '{x:'.$key.', y:'.$data.'},';
        }
        $str = substr($str,0,-1);
        return '['.$str.']';
    }

	public function data_quarters($year = '2016', $order_status = '0')
	{
		$check_date = checkdate('1','1',$year);
        if(!$check_date)
        {
           return redirect('admin/turnover');
        }
        $i = 1;
        $total_all = [];
        $count_quarters = 4;

        while( $count_quarters >0 )
        {
        	//Lấy tháng cuối quá
        	$j = $i+3 ;
        	//Lấy số ngày tháng cuối của quý
            $time = strtotime("$year-$j-1");
            $count_day = date('t',$time);
        	//Lấy ngày bắt đầu của quý
        	$start = mktime( '0','0','0',$i ,'1', $year);
        	//Lấy ngày cuối cùng của quý
        	$end = mktime( '23','59','59',$j,$count_day , $year);

        	$orders = $this->m_order
                             ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
                             ->select('qm_ordermeta.om_value')
                             ->where('qm_order.order_date','>',$start)
                             ->where('qm_order.order_date','<',$end)
                             ->where('qm_ordermeta.om_key','order_detail')
                             ->where('qm_order.order_status',$order_status)
                             ->get();
            $total = 0;
            if( count($orders)>0 )
            {
            	foreach($orders as $order)
            	{
            		$order_metas = decode_serialize($order->om_value);
            		foreach ($order_metas as $key => $order_meta)
            		{
            			$total += $order_meta['quantity'] * $order_meta['sub_total'];
            		}
            	}
            }
            $total_all[$i] = $total;
        	$i += 3;
        	$count_quarters -= 1;
        }
        $i = 1 ;
        $str = '';
        foreach( $total_all as $key => $data)
        {
        	$str .= '{x:'.$i.', y:'.$data.'},';
        	$i++;
        }
        $str = substr($str,0,-1);
        return '['.$str.']';
	}

}