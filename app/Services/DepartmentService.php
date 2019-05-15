<?php

namespace App\Services;

use App\Consts;
use App\Models\Department;
use App\Models\DepartmentRoll;
use App\Services\BaseService as Base;
use Carbon\Carbon;
use DB;
use Exception;

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

    public function getAll($request)
    {
        return $this->basePaginate($request, $this->model);
    }

    public function store($request)
    {
        $rolls = explode(',', $request->rolls);
        $params = $request->except('rolls');
        $department = $this->model->create($params);
        $department->rolls()->attach($rolls);
        return $department;
    }

    public function update($request)
    {
        $rolls = explode(',', $request->rolls);
        $params = $request->except('rolls');
        $department = $this->model->find($this->getID($request));

        $department->update($params);

        $oldRolls = DepartmentRoll::where('department_id', $department->id)->pluck('roll_id');
        $deleteArray = array_diff($oldRolls->toArray(), $rolls);
        $addArray = array_diff($rolls, $oldRolls->toArray());

        if (!empty($deleteArray)) {
            $department->rolls()->detach($deleteArray);
        }

        if (!empty($addArray)) {
            $department->rolls()->attach($addArray);
        }

        return $department;
    }

    public function getDepartment($request)
    {
        return $this->model->where('id', $request['id'])
            ->with(['rolls'])
            ->first();
    }
}
