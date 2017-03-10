<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmCustomer
 */
class QmCustomer extends Model
{
    protected $table = 'qm_customer';

    protected $primaryKey = 'customer_id';

	public $timestamps = false;

    protected $fillable = [
        'customer_fullname',
        'customer_phone',
        'customer_email',
        'email_advertising',
        'customer_pass',
        'customer_address',
        'customer_province',
        'customer_district',
        'customer_gender',
        'customer_notes',
        'customer_status',
        'customer_level'
    ];

    protected $guarded = [];

        
}