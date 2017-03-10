<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmUserMetum
 */
class QmUserMetum extends Model
{
    protected $table = 'qm_user_meta';

    protected $primaryKey = 'meta_id';

	public $timestamps = false;

    protected $fillable = [
        'user_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}