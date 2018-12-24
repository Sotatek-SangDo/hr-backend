<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $table = 'dependents';

    protected $fillable = [
        'emp_id',
        'full_name',
        'relationship',
        'birthday'
    ];
}
