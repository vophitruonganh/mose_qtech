<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\BackendController;

use DB;
use Session;

class StatisticController extends BackendController{
    private function temp(){
        //TIME
        $arrDateNow  = date_parse_from_format('j.n.Y H:iP', date('d-m-Y',time()));
        $arrDateLast = date_parse_from_format('j.n.Y H:iP', date('d-m-Y',time() - 31*3600*24));
        $timeOut     = 60;

        //CHECK DATABASE
        $statistic = $this->m_statistic->select('statistic_key','statistic_value','statistic_total')
                                        ->where('statistic_key',$arrDateNow['month'] . '-' .$arrDateNow['year'])
                                        ->first();

        //TINH STATISTIC
        if(!empty($statistic)){
            //DECODE VALUE
            $valueStatistic = decode_serialize($statistic->statistic_value);
            $totalVisit = 0;
            $kToday     = 0;
            $yesterday  = 0;
            $today      = 0;
            $str        = '';

            foreach($valueStatistic as $k => $v){
                //TINH TODAY
                if($k == $arrDateNow['day']){
                    $today  = $v;
                }else{
                    $today = 0;
                }
                //TINH YESTERDAY
                $kToday                  = time() - 60 * 60 * 24;
                $arrDateYesterday        = date_parse_from_format('j.n.Y H:iP', date('d-m-Y',$kToday));
                $statisticYesterday      = $this->m_statistic
                                                ->select('statistic_key','statistic_value')
                                                ->where('statistic_key',$arrDateYesterday['month'] . '-' .$arrDateYesterday['year'])
                                                ->first();

                if(!empty($statisticYesterday)){
                    $valueStatisticYesterday = decode_serialize($statisticYesterday->statistic_value);
                    if(isset($valueStatisticYesterday[$arrDateYesterday['day']])){
                        $yesterday = $valueStatisticYesterday[$arrDateYesterday['day']];
                    }
                }

                //TINH TONG TRUY CAP THEO THANG
                $totalVisit += $v;

                //LOAD BIEU DO
                $str .= '{x:'.$k.', y:'.$v.'},';
            }
            $str = substr($str,0,-1);


            //INSERT TOTAL MONTH AND GET MONTH
            $this->m_statistic->where('statistic_key',$arrDateNow['month'] . '-' .$arrDateNow['year'])->update(['statistic_total' => $totalVisit]);
            $month      = $this->m_statistic->select('statistic_total')->where('statistic_key',$arrDateNow['month'] . '-' .$arrDateNow['year'])->first();
            $monthLast  = $this->m_statistic->select('statistic_total')->where('statistic_key',$arrDateLast['month'] . '-' .$arrDateLast['year'])->first();

            //TOTAL YEAR
            $year = $this->m_statistic->where('statistic_key','like','%'.$arrDateNow['year'])->sum('statistic_total');

            //TOTAL VISIT
            $totalVisit = $this->m_statistic->sum('statistic_total');

        }else{
            $today = 0;
            $yesterday = 0;
            $totalVisit = 0;
            $year = $this->m_statistic->where('statistic_key','like','%'.$arrDateNow['year'])->sum('statistic_total');
            if($year == 0){
                $year = 0;
            }
        }
        //END TINH STATISTIC

		// return view('backend.pages.statistic.index',[
  //           'today'         => $today,
  //           'yesterday'     => $yesterday,
  //           'month'         => (empty($month)) ? '0' : $month->statistic_total,
  //           'monthLast'     => (empty($monthLast)) ? '0' : $monthLast->statistic_total,
  //           'year'          => $year,
  //           'totalVisit'    => $totalVisit,
  //       ]);

        // return view('backend.pages.statistic.index',[
        //     'str'   => $str,
        //     'month' => $arrDateNow['month'],
        // ]);
    }

    //LOAD DEFAULT CHART BY MONTH
    public function loadDefaultMonth(){
        //TIME
        $arrDateNow  = date_parse_from_format('j.n.Y H:iP', date('d-m-Y',time()));
        $arrDateLast = date_parse_from_format('j.n.Y H:iP', date('d-m-Y',time() - 31*3600*24));

        //CHECK DATABASE
        $statistic = $this->m_statistic->select('statistic_key','statistic_value','statistic_total')->where('statistic_key',$arrDateNow['month'] . '-' .$arrDateNow['year'])->first();

        //TINH STATISTIC
        if(!empty($statistic)){
            //DECODE VALUE
            $valueStatistic = decode_serialize($statistic->statistic_value);

            $totalVisit = 0;
            $str        = '';
            foreach($valueStatistic as $k => $v){
                //TINH TONG TRUY CAP THEO THANG
                $totalVisit += $v;

                //LOAD BIEU DO
                $str .= '{x:'.$k.', y:'.$v.'},';
            }
            $str = substr($str,0,-1);


            //UPDATE TOTAL MONTH
            $this->m_statistic->where('statistic_key',$arrDateNow['month'] . '-' .$arrDateNow['year'])->update(['statistic_total' => $totalVisit]);

            //TOTAL VISIT
            $totalVisit = $this->m_statistic->sum('statistic_total');

        }else{
            $totalVisit = 0;
        }

        //LOC THEO THANG
        $monthStatistic = $this->m_statistic->select('statistic_key')->orderBy('statistic_id','ASC')->get();

        //LOC THEO NAM
        $yearStatistic = DB::select(DB::raw("SELECT SUBSTRING(statistic_key, -4) AS year FROM qm_statistic GROUP BY(SUBSTRING(statistic_key, -4)) ORDER BY statistic_id ASC "));


        return view('backend.pages.statistic.default_month',[
            'monthStatistic'    => $monthStatistic,
            'yearStatistic'     => $yearStatistic,
            'str'               => empty($str) ?  '{x:0 , y: 0 }' : $str,
            'date'              => $arrDateNow['month'] . '-' . $arrDateNow['year'],
            'month'             => $arrDateNow['month'],
            'year'              => $arrDateNow['year'],
        ]);
    }

    //SUBMIT MONTH
    // public function changeMonth(){


    //      //CHECK DATABASE
    //     $statistic = $this->m_statistic->select('statistic_key','statistic_value')->where('statistic_key',$_POST['month'])->first();


    //     if(!empty($statistic)){
    //         //DECODE VALUE
    //         $valueStatistic = decode_serialize($statistic->statistic_value);

    //         $str        = '';
    //         foreach($valueStatistic as $k => $v){
    //             $str .= '{x:'.$k.', y:'.$v.'},';
    //         }
    //         $str = substr($str,0,-1);
    //     }

    //     return view('backend.pages.statistic.change_month',[
    //         'str'               => $str,
    //         'date'              => $_POST['month'],
    //     ]);
    // }

    // //SUBMIT YEAR
    // public function changeYear(){
    //     $statistic = DB::select(
    //     DB::raw("
    //             SELECT statistic_key,statistic_total
    //             FROM qm_statistic
    //             WHERE $_POST[year] = (substr(statistic_key, -4))
    //         ")
    //     );
    //     // $statistic = $this->m_statistic
    //     //                 ->select('statistic_key','statistic_total')
    //     //                 ->where($_POST[year],'=',(SUBSTRING(statistic_key, -4)));
    //     // $statistic = $this->m_statistic->select('statistic_key','statistic_total')->where('statistic_key','like','%2016')->pluck('statistic_total','statistic_key');
    //     if(!empty($statistic)){
    //          //DECODE VALUE

    //         $str        = '';
    //         foreach($statistic as $item){
    //             $arrYear = explode('-',$item->statistic_key);
    //             $str .= '{x:'.$arrYear[0].', y:'.$item->statistic_total.'},';
    //         }
    //         $str = substr($str,0,-1);
    //     }

    //     return view('backend.pages.statistic.change_year',[
    //         'str'               => $str,
    //         'year'              => $_POST['year'],
    //     ]);
    // }
}
