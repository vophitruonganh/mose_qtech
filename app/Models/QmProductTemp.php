<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmProductTemp
 */
class QmProductTemp extends Model
{
    protected $table = 'qm_product_temp';

    protected $primaryKey = 'product_temp_id';

	public $timestamps = false;

    protected $fillable = [
        'variant_id',
        'product_id',
        'variant_name',
        'title',
        'slug',
        'price',
        'quantity_buy',
        'quantity_refuned',
        'image'
    ];

    protected $guarded = [];

        
}