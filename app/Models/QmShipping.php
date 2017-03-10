<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmShipping
 */
class QmShipping extends Model
{
    protected $table = 'qm_shipping';

    protected $primaryKey = 'shipping_id';

	public $timestamps = false;

    protected $fillable = [
        'place',
        'name',
        'price',
        'type',
        'rate_from',
        'rate_to',
        'parent',
        'status'
    ];

    protected $guarded = [];

        
}