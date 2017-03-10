<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmProduct
 */
class QmProduct extends Model
{
    protected $table = 'qm_product';

    protected $primaryKey = 'product_id';

	public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_date',
        'product_modified',
        'product_title',
        'product_content',
        'product_excerpt',
        'product_status',
        'product_slug',
        'product_image',
        'comment_status'
    ];

    protected $guarded = [];

        
}