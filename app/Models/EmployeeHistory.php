<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeHistory extends Model
{
    protected $table = 'history_employees';

    protected $fillable = [
        'emp_id',
        'department_id',
        'job_id',
        'paygrade_id',
        'status'
    ];

}
