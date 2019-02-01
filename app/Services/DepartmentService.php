<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Department;
use Carbon\Carbon;
use App\Services\BaseService as Base;
use App\Consts;

class DepartmentService extends Base
{
    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    public function getEDepartment()
    {
        $departments = $this->model->leftjoin('employees', 'employees.department_id', '=', 'departments.id')
            ->leftjoin('jobs', 'jobs.id', '=', 'employees.job_id')
            ->select('departments.*', 'employees.name as emp_name', 'employees.department_id', 'jobs.title as title')
            ->orderBy('name', 'DESC')
            ->get();
        return $departments;
    }
}
