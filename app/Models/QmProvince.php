<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmProvince
 */
class QmProvince extends Model
{
    protected $table = 'qm_provinces';

    protected $primaryKey = 'province_id';

	public $timestamps = false;

    protected $fillable = [
        'province_name',
        'province_type'
    ];

    protected $guarded = [];

        
}