<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Contract;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class ContractService extends Base
{
    public function __construct(Contract $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['contractType']);
        return $this->basePaginate($request, $query);
    }

    public function store($request)
    {
        $contract = $this->baseStore($request);
        return $contract;
    }

    public function update($request)
    {
        $contract = $this->baseUpdate($request);
        return $contract;
    }
}
