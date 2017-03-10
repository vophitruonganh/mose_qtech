<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

use App\Models\Order;
use Validator;
use DB;

class SellingProductsController extends BackendController
{
    public function index(){
        $getDate = getdate();
        return view('backend.pages.selling_products.index',[
            'getDate' => $getDate,
        ]);
    }

    public function showByDate(Request $request)
    {
        $data = $request->all();

        $date = isset($data['date']) ? $data['date'] : 0;
        $month = isset($data['month']) ? $data['month'] : 0;
        $year = isset($data['year']) ? $data['year'] : 0;

        if( !checkdate($month,$date,$year) ){
            return redirect('admin/dashboard');
        }

        $startDate = mktime(0,0,0,$month,$date,$year);
        $endDate = mktime(23,59,59,$month,$date,$year);

        $sellingProducts = $this->querySellingProducts([$startDate,$endDate]);

        return view('backend.pages.selling_products.list',[
            'sellingProducts' => $sellingProducts,
        ]);
    }

    public function showByCurrentWeek(){
        $startDate = strtotime('-'.(date('w')-1).' days');
        $endDate = strtotime('+'.(7-date('w')).' days');

        $sellingProducts = $this->querySellingProducts([$startDate,$endDate]);

        return view('backend.pages.selling_products.list',[
            'sellingProducts' => $sellingProducts,
        ]);
    }

    public function showByMonth(Request $request){
        $data = $request->all();

        $month = isset($data['month']) ? $data['month'] : 0;
        $year = isset($data['year']) ? $data['year'] : 0;

        if( !checkdate($month,1,$year) ){
            return redirect('admin/dashboard');
        }

        $startDate = mktime(0,0,0,$month,1,$year);
        $endDate = mktime(23,59,59,$month,date('t',mktime(0,0,0,$month,1,$year)),$year);

        $sellingProducts = $this->querySellingProducts([$startDate,$endDate]);

        return view('backend.pages.selling_products.list',[
            'sellingProducts' => $sellingProducts,
        ]);
    }

    public function showByYear(Request $request){
        $data = $request->all();

        $year = isset($data['year']) ? $data['year'] : 0;

        if( !checkdate(1,1,$year) ){
            return redirect('admin/dashboard');
        }

        $startDate = mktime(0,0,0,1,1,$year);
        $endDate = mktime(23,59,59,12,date('t',mktime(0,0,0,12,1,$year)),$year);

        $sellingProducts = $this->querySellingProducts([$startDate,$endDate]);

        return view('backend.pages.selling_products.list',[
            'sellingProducts' => $sellingProducts,
        ]);
    }

    public function showByFromDayToDay(Request $request){
        $data = $request->all();

        $fromDate = isset($data['fromDate']) ? $data['fromDate'] : 0;
        $fromMonth = isset($data['fromMonth']) ? $data['fromMonth'] : 0;
        $fromYear = isset($data['fromYear']) ? $data['fromYear'] : 0;

        if( !checkdate($fromMonth,$fromDate,$fromYear) ){
            return redirect('admin/dashboard');
        }

        $toDate = isset($data['toDate']) ? $data['toDate'] : 0;
        $toMonth = isset($data['toMonth']) ? $data['toMonth'] : 0;
        $toYear = isset($data['toYear']) ? $data['toYear'] : 0;

        if( !checkdate($toMonth,$toDate,$toYear) ){
            return redirect('admin/dashboard');
        }

        $startDate = mktime(0,0,0,$fromMonth,$fromDate,$fromYear);
        $endDate = mktime(23,59,59,$toMonth,$toDate,$toYear);

        if( $startDate > $endDate )
{
            return redirect('admin/dashboard');
        }

        $sellingProducts = $this->querySellingProducts([$startDate,$endDate]);

        return view('backend.pages.selling_products.list',[
            'sellingProducts' => $sellingProducts,
        ]);
    }

    private function querySellingProducts($between){
        return DB::table('qm_order')
            ->select('*',DB::raw('count(*) as count_buys'))
            ->join('qm_post', 'qm_post.post_id','=','qm_order.post_id')
            ->whereBetween('qm_order.order_date',$between)
            ->groupBy('qm_order.post_id')
            ->orderBy('count_buys','desc')
            ->get();
    }
}
