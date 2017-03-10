<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmProductRelationship
 */
class QmProductRelationship extends Model
{
    protected $table = 'qm_product_relationships';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'taxonomy_id',
        'taxonomy_order'
    ];

    protected $guarded = [];

        
}