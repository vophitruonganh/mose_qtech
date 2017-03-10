<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmPostRelationship
 */
class QmPostRelationship extends Model
{
    protected $table = 'qm_post_relationships';

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'taxonomy_id',
        'taxonomy_order'
    ];

    protected $guarded = [];

        
}