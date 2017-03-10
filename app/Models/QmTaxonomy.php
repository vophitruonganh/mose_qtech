<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmTaxonomy
 */
class QmTaxonomy extends Model
{
    protected $table = 'qm_taxonomy';

    protected $primaryKey = 'taxonomy_id';

	public $timestamps = false;

    protected $fillable = [
        'taxonomy_name',
        'taxonomy_parent',
        'taxonomy_count',
        'taxonomy_slug',
        'taxonomy_excerpt',
        'taxonomy_type'
    ];

    protected $guarded = [];

        
}