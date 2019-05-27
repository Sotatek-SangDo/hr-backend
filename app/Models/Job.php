<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'hr_jobs';

    protected $fillable = [
        'title'
    ];

}
