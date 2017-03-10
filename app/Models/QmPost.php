<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmPost
 */
class QmPost extends Model
{
    protected $table = 'qm_post';

    protected $primaryKey = 'post_id';

	public $timestamps = false;

    protected $fillable = [
        'user_id',
        'post_date',
        'post_modified',
        'post_title',
        'post_content',
        'post_excerpt',
        'post_status',
        'post_slug',
        'post_parent',
        'post_image',
        'comment_status',
        'post_type'
    ];

    protected $guarded = [];

        
}