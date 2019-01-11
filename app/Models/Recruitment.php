<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = "recruitments";

    protected $fillable = [
    	'name',
        'job_id',
        'started_at',
        'ended_at',
        'status',
        'expired_at',
        'num',
        'recruitment_required'
    ];
}
