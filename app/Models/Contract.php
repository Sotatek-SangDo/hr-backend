<?php

namespace App\Models;

use App\Models\ContractType;
use App\Models\Employee;
use App\Models\SalaryInsurance;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = ['employee_id', 'contract_code', 'start_date', 'end_date', 'contract_type_id', 'salary_id', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function contractType()
    {
        return $this->hasOne(ContractType::class, 'id', 'contract_type_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    public function salary()
    {
        return $this->hasOne(Salary::class, 'id', 'salary_id');
    }

    public function salaryInsurance()
    {
        return $this->hasManyThrough(SalaryInsurance::class, Salary::class, 'salary_insurance_id', 'id');
    }
}
