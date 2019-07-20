<?php

namespace App\Services;

use App\Models\Allowances;
use App\Services\BaseService as Base;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;

class AllowancesService extends Base
{
    public function __construct(Allowances $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['employee']);
        return $this->basePaginate($request, $query);
    }

    public function store($request)
    {
        $allowance = $this->baseStore($request);
        return $allowance;
    }

    public function update($request)
    {
        $allowance = $this->baseUpdate($request);
        return $allowance;
    }

    public function getAllowances($request)
    {
        return $this->model->with([
            'employee',
        ])->where('id', $request['id'])
        ->first();
    }

    public function dateFields()
    {
        return ['apply_date'];
    }
}
