<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmDistrict
 */
class QmDistrict extends Model
{
    protected $table = 'qm_districts';

    protected $primaryKey = 'district_id';

	public $timestamps = false;

    protected $fillable = [
        'district_name',
        'province_id'
    ];

    protected $guarded = [];

        
}