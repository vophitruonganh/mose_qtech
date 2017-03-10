<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmTaxonomyMetum
 */
class QmTaxonomyMetum extends Model
{
    protected $table = 'qm_taxonomy_meta';

    protected $primaryKey = 'meta_id';

	public $timestamps = false;

    protected $fillable = [
        'taxonomy_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}