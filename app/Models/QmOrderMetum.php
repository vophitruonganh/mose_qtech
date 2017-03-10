<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmOrderMetum
 */
class QmOrderMetum extends Model
{
    protected $table = 'qm_order_meta';

    protected $primaryKey = 'om_id';

	public $timestamps = false;

    protected $fillable = [
        'order_id',
        'om_key',
        'om_value'
    ];

    protected $guarded = [];

        
}