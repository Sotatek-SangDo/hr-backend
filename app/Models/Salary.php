<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\SalaryInsurance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;

    protected $table = 'salaries';

    protected $fillable = ['salary_insurance_id', 'salary_basic', 'notes', 'deleted_at', 'apply_date'];

    protected $hidden = ['created_at', 'updated_at'];

    public function insurance()
    {
        return $this->hasOne(SalaryInsurance::class, 'id', 'salary_insurance_id');
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'salary_id', 'id');
    }

    public function employee()
    {
        return $this->hasManyThrough(Employee::class, Contract::class, 'salary_id', 'id', 'id', 'employee_id');
    }
}
