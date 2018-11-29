<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Nationality;
use App\Models\EmployeeStatus;
use App\Models\Job;
use App\Models\PayGrade;
use DB;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'name',
        'work_email',
        'avatar',
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
        'indirect_supervisor',
        'department_id',
        'transportation_id',
        'paygrade_id',
        'notes',
        'status',
        'job_id'
    ];

    protected $appends = [
        'supervisor_name',
        'indirect_supervisor_name'
    ];

    public function nationality()
    {
        return $this->hasOne(Nationality::class, 'id', 'nationality_id');
    }

    public function employeeStatus()
    {
        return $this->hasOne(EmployeeStatus::class, 'id', 'status');
    }

    public function job()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    public function payGrade()
    {
        return $this->hasOne(PayGrade::class, 'id', 'paygrade_id');
    }

    public function getSupervisorNameAttribute()
    {
        return $this->getSupervisor($this->supervisor_id);
    }

    public function getIndirectSupervisorNameAttribute()
    {
        return $this->getSupervisor($this->indirect_supervisor);
    }

    private function getSupervisor($id)
    {
        $emp = DB::table('employees')
        ->where('id', $id)
        ->first();
        return $emp ? $emp->name : '';
    }
}
