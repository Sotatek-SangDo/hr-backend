<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowances extends Model
{
    protected $table = 'allowances';

    protected $fillable = ['employee_id', 'allowance_type', 'subsidy', 'apply_date', 'notes', 'status'];

    protected $hidden = ['created_ad', 'updated_at'];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
