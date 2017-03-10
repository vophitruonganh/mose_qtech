<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmStatistic
 */
class QmStatistic extends Model
{
    protected $table = 'qm_statistic';

    protected $primaryKey = 'statistic_id';

	public $timestamps = false;

    protected $fillable = [
        'statistic_key',
        'statistic_value',
        'statistic_total'
    ];

    protected $guarded = [];

        
}