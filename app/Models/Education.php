<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'qualification_id',
        'emp_id',
        'institute',
        'started_at',
        'ended_at'
    ];
}
