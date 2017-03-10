<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmProductMetum
 */
class QmProductMetum extends Model
{
    protected $table = 'qm_product_meta';

    protected $primaryKey = 'meta_id';

	public $timestamps = false;

    protected $fillable = [
        'product_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}