<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Insurance;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class InsuranceService extends Base
{
    public function __construct(Insurance $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['employee'])
            ->select('employees.name as name', 'insurances.*', 'jobs.title as title')
            ->leftjoin('employees', 'employees.id', '=', 'insurances.emp_id')
            ->leftjoin('jobs', 'employees.job_id', '=', 'jobs.id');
        return $this->basePaginate($request, $query);
    }

    public function dateFields()
    {
        return ['started_at'];
    }
}
