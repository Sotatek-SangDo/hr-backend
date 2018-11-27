<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    protected $table = 'status_emp';

    protected $fillable = [
        'status'
    ];

}
