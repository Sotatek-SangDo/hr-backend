<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Employee;

class InsuranceEmployeePayment extends Model
{
    protected $table = 'insurance_employee_payment';

    protected $fillable = [
        'ip_id',
        'emp_id',
        'reason_leave',
        'num_social_security',
        'num_day_leave',
        'insurance_money',
        'amount',
        'notes'
    ];

    protected $appends = [
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'emp_id');
    }
}
