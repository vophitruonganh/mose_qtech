<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmDiscount
 */
class QmDiscount extends Model
{
    protected $table = 'qm_discount';

    protected $primaryKey = 'discount_id';

	public $timestamps = false;

    protected $fillable = [
        'discount_title',
        'discount_limit_start',
        'discount_limit_end',
        'discount_date_start',
        'discount_date_end',
        'discount_status',
        'offer_option',
        'promotion_allow',
        'discount_option',
        'discount_take',
        'discount_offer',
        'money_over',
        'discount_type',
        'relationship_id',
        'relationship_title'
    ];

    protected $guarded = [];

        
}