<?php

namespace App\Services;

use App\Models\SalaryBusiness;
use App\Services\BaseService as Base;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;

class SalaryBusinessService extends Base
{
    public function __construct(SalaryBusiness $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['employee']);
        return $this->basePaginate($request, $query);
    }

    public function getSalaryBusiness($request)
    {
        return $this->model->with([
            'employee',
        ])->where('id', $request['id'])
        ->first();
    }
}
