<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'name',
        'work_email',
        'private_email',
        'nationality_id',
        'ethnicity',
        'country',
        'address',
        'joined_at',
        'phone',
        'gender',
        'birthday',
        'marital_status',
        'confirmed_at',
        'supervisor_id',
        'department_id',
        'transportation_id',
        'paygrade_id',
        'notes',
        'status',
        'job_id'
    ];

}
