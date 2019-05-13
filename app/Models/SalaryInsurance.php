<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryInsurance extends Model
{
    protected $table = 'salary_insurances';

    protected $hidden = ['created_at', 'updated_at'];
}
