<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmPostMetum
 */
class QmPostMetum extends Model
{
    protected $table = 'qm_post_meta';

    protected $primaryKey = 'meta_id';

	public $timestamps = false;

    protected $fillable = [
        'post_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}