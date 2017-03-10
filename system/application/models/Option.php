<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $table = 'qm_option';
    public $timestamps = false;

    public function Insert_option($data)
    {
		return Option::insert($data);
    }
	
	public function Update_option($optionName, $optionValue)
    {
		return Option::where([
			'option_name' => $optionName,
		])->update([
			'option_value' => $optionValue,
		]);
	}

    public function getOptionValue_option($optionName)
	{
		return Option::where([
            'option_name' => $optionName,
        ])->first()->option_value;
	}

	public function Get_option_value($optionName)
	{
		return Option::where([
            'option_name' => $optionName,
        ])->first()->option_value;
	}

	public function Get_option($optionName)
	{
		return Option::where([
            'option_name' => $optionName,
        ])->first();
	}

	public function Delete_option($optionName)
	{
		return Option::where([
			'option_name' => $optionName,
		])->delete();
	}
}
