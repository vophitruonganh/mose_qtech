<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
class GeneralController extends BackendController
{

	/**
	 * Class Constructor
	 */
	public function __construct(){
		parent::__construct();
	}

    public function GetDistricts(Request $request)
    {
        $data = $request->all();
        $province_id = isset($data['province_id']) ? $data['province_id'] : 0;
        $districts = $this->m_district->Get_districts_by_province_id($province_id);
        return $districts;
    }

}
