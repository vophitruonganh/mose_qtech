<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmVariantMetum
 */
class QmVariantMetum extends Model
{
    protected $table = 'qm_variant_meta';

    protected $primaryKey = 'meta_id';

	public $timestamps = false;

    protected $fillable = [
        'variant_id',
        'variant_name',
        'variant_value',
        'variant_order'
    ];

    protected $guarded = [];

        
}