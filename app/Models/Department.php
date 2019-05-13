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
        'count_emp'
    ];

    public function getCountEmpAttribute()
    {
        $count = DB::table('employees')->where('department_id', $this->id)->count();
        return $count;
    }
}
