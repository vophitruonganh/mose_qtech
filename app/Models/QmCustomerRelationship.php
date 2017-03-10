<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmCustomerRelationship
 */
class QmCustomerRelationship extends Model
{
    protected $table = 'qm_customer_relationships';

    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'taxonomy_id',
        'customer_order'
    ];

    protected $guarded = [];

        
}