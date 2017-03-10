<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmCustomerMetum
 */
class QmCustomerMetum extends Model
{
    protected $table = 'qm_customer_meta';

    protected $primaryKey = 'meta_id';

	public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}