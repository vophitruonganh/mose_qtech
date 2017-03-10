<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmOrder
 */
class QmOrder extends Model
{
    protected $table = 'qm_order';

    protected $primaryKey = 'order_id';

	public $timestamps = false;

    protected $fillable = [
        'order_code',
        'user_id',
        'shipping_id',
        'customer_id',
        'customer_fullname',
        'order_content',
        'order_discount',
        'order_discount_notes',
        'order_weight',
        'amount_order',
        'amount_payment',
        'amount_refuned',
        'amount_discount',
        'amount_discount_notes',
        'amount_ship',
        'date_create',
        'date_payment',
        'order_ems',
        'order_payment',
        'order_ship',
        'order_status',
        'order_active'
    ];

    protected $guarded = [];

        
}