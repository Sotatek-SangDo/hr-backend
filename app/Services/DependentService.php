<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Dependent;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class DependentService extends Base
{
    public function __construct(Dependent $model)
    {
        $this->model = $model;
    }

    public function getEDependents($request)
    {
        return $this->model->where('emp_id', $request['id'])->get();
    }

    public function dateFields()
    {
        return ['birthday'];
    }
}
