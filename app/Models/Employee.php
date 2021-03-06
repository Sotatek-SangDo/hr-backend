<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Nationality;
use App\Models\EmployeeStatus;
use App\Models\Job;
use App\Models\PayGrade;
use App\Models\Department;
use App\Models\SkillUser;
use App\Models\UserLanguages;
use App\Models\CertificationUser;
use App\Models\Education;
use App\Models\EmergencyContact;
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
        'indirect_supervisor_name',
        'count_skill',
        'count_edu',
        'count_certification',
        'count_lang',
        'count_contact'
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

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function skills()
    {
        return $this->hasMany(SkillUser::class, 'emp_id', 'id');
    }

    public function languages()
    {
        return $this->hasMany(UserLanguages::class, 'emp_id', 'id');
    }

    public function certifications()
    {
        return $this->hasMany(CertificationUser::class, 'emp_id', 'id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'emp_id', 'id');
    }

    public function emergencyContracts()
    {
        return $this->hasMany(EmergencyContact::class, 'emp_id', 'id');
    }

    public function getSupervisorNameAttribute()
    {
        return $this->getSupervisor($this->supervisor_id);
    }

    public function getIndirectSupervisorNameAttribute()
    {
        return $this->getSupervisor($this->indirect_supervisor);
    }

    public function getCountSkillAttribute()
    {
        $count = DB::table('skill_user')->where('emp_id', $this->id)->count();
        return $count ?: 1;
    }

    public function getCountEduAttribute()
    {
        $count = DB::table('educations')->where('emp_id', $this->id)->count();
        return $count ?: 1;
    }

    public function getCountCertificationAttribute()
    {
        $count = DB::table('certification_user')->where('emp_id', $this->id)->count();
        return $count ?: 1;
    }

    public function getCountLangAttribute()
    {
        $count = DB::table('languages_emp')->where('emp_id', $this->id)->count();
        return $count ?: 1;
    }

    public function getCountContactAttribute()
    {
        $count = DB::table('emergency_contacts')->where('emp_id', $this->id)->count();
        return $count ?: 1;
    }

    private function getSupervisor($id)
    {
        $emp = DB::table('employees')
        ->where('id', $id)
        ->first();
        return $emp ? $emp->name : '';
    }
}
