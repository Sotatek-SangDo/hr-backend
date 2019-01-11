<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Insurance extends Model
{
    protected $table = 'insurances';

    protected $fillable = [
        'emp_id',
        'num_social_security',
        'num_health_insurance',
        'place_registration_medical',
        'salary_paid',
        'started_at',
        'status'
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'emp_id');
    }
}
