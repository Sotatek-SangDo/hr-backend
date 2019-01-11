<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Department;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class DepartmentService extends Base
{
    public function getAll()
    {
        return Department::all();
    }

    public function store($data)
    {
        return Department::create([
            'name' => $data["name"],
            'email' => $data["email"],
            'phone_number' => $data['phone_number']
        ]);
    }

    public function getEDepartment()
    {
        $departments = Department::leftjoin('employees', 'employees.department_id', '=', 'departments.id')
            ->leftjoin('jobs', 'jobs.id', '=', 'employees.job_id')
            ->select('departments.*', 'employees.name as emp_name', 'employees.department_id', 'jobs.title as title')
            ->orderBy('name', 'DESC')
            ->get();
        return $departments;
    }
}