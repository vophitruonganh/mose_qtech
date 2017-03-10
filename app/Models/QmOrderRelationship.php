<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmOrderRelationship
 */
class QmOrderRelationship extends Model
{
    protected $table = 'qm_order_relationships';

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'product_temp_id'
    ];

    protected $guarded = [];

        
}