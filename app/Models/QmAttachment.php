<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmAttachment
 */
class QmAttachment extends Model
{
    protected $table = 'qm_attachment';

    protected $primaryKey = 'attachment_id';

	public $timestamps = false;

    protected $fillable = [
        'user_id',
        'attachment_title',
        'attachment_url',
        'attachment_content',
        'attachment_date',
        'attachment_name',
        'attachment_type',
        'attachment_mime_type'
    ];

    protected $guarded = [];

        
}