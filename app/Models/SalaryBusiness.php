<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryBusiness extends Model
{
    protected $table = 'salary_business';

    protected $fillable = ['employee_id', 'sales', 'amount', 'unit'];

    protected $hidden = ['created_at', 'updated_at'];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
