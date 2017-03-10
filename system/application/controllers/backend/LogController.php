<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\BackendController;
use Session;

class LogController extends BackendController
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
		$this->m_log->where('log_date','<',(time() - 86400))->delete();
        $logs = $this->m_log->paginate(10);

        return view('backend.pages.log.list',[
            'logs' => $logs,
        ]);
    }

    public function index2(){
        $this->m_log->where('log_date','<',(time() - 86400))->where('user_id', Session::get('user_id'))->delete();
        $logs = $this->m_log->select('log_type','log_action','log_date')->where('user_id',Session::get('user_id'))->orderBy('log_id', 'desc')->get();

        return view('backend.pages.log.list2',[
            'logs' => $logs,
        ]);

    }
}
