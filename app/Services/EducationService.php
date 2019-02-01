<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Education;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class EducationService extends Base
{
    public function __construct(Education $model)
    {
        $this->model = $model;
    }

    public function getEmployeeEducation($request)
    {
        return Education::where('emp_id', $request["id"])->get();
    }

    public function dateFields()
    {
        return ['started_at', 'ended_at'];
    }
}
