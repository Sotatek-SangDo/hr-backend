<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use DB;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'email',
        'phone_number'
    ];

    protected $appends = [
        'count_emp',
        'count_roll'
    ];

    public function getCountEmpAttribute()
    {
        return DB::table('employees')->where('department_id', $this->id)->count();
    }

    public function rolls()
    {
        return $this->belongsToMany(Roll::class, 'department_roll');
    }

    public function getCountRollAttribute()
    {
        return DB::table('department_roll')->where('department_id', $this->id)->count();
    }
}
