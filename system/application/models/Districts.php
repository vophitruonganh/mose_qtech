<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    public $table = 'qm_districts';
    public $timestamps = false;

    public function Get_districts_by_province_id($province_id)
    {
    	return Districts::where('province_id',$province_id)->orderBy('district_name','asc')->get();
	}

	public function Check_district($district_id,$province_id)
	{
    	return Districts::where('district_id',$district_id)->where('province_id',$province_id)->first();
	}
    public function get_district_name($district_id,$province_id)
    {
        return Districts::where('district_id',$district_id)->where('province_id',$province_id)->value('district_name');
    }
}
