<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmVariant
 */
class QmVariant extends Model
{
    protected $table = 'qm_variant';

    protected $primaryKey = 'variant_id';

	public $timestamps = false;

    protected $fillable = [
        'product_id',
        'sku',
        'price_old',
        'price_new',
        'weight',
        'barcode',
        'tracking_policy',
        'out_of_stock',
        'quantity',
        'inventory',
        'ship',
        'image'
    ];

    protected $guarded = [];

        
}