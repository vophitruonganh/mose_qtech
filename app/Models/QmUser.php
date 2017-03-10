<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmUser
 */
class QmUser extends Model
{
    protected $table = 'qm_user';

    protected $primaryKey = 'user_id';

	public $timestamps = false;

    protected $fillable = [
        'user_fullname',
        'user_phone',
        'user_email',
        'user_notify',
        'user_pass',
        'user_address',
        'user_province',
        'user_district',
        'user_gender',
        'user_notes',
        'user_status',
        'user_level'
    ];

    protected $guarded = [];

        
}