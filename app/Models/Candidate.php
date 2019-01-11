<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = "candidate";

    protected $fillable = [
    	'job_id',
        'email',
        'name',
        'gender',
        'birthday',
        'phonenumber',
        'description'
    ];
}
