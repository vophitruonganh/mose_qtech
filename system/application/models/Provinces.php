<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    public $table = 'qm_provinces';
    public $timestamps = false;

    public function Get_all_provinces()
    {
    	return Provinces::orderBy('province_name','asc')->get();
	}

	public function Get_provinces_id($id)
	{
    	return Provinces::where('province_id',$id)->first();
	}
    public function get_province_name($id)
    {
        return Provinces::where('province_id',$id)->value('province_name');
    }
}
