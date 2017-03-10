<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmLog
 */
class QmLog extends Model
{
    protected $table = 'qm_log';

    protected $primaryKey = 'log_id';

	public $timestamps = false;

    protected $fillable = [
        'user_id',
        'post_id',
        'attachment_id',
        'order_code',
        'log_date',
        'log_content',
        'log_description',
        'log_type',
        'log_action',
        'log_status'
    ];

    protected $guarded = [];

        
}