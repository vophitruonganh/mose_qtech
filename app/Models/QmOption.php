<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QmOption
 */
class QmOption extends Model
{
    protected $table = 'qm_option';

    protected $primaryKey = 'option_id';

	public $timestamps = false;

    protected $fillable = [
        'option_name',
        'option_value',
        'autoload'
    ];

    protected $guarded = [];

        
}