<?php

namespace App\Services;

use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Salary;
use App\Services\BaseService as Base;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;

class ContractService extends Base
{
    public function __construct(Contract $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['contractType', 'employee', 'salary', 'salaryInsurance']);
        return $this->basePaginate($request, $query);
    }

    public function store($request)
    {
        $salary = Salary::create(['salary_basic' => $request->salary_basic]);
        $request->except('salary_basic');
        $request->request->add(['salary_id' => $salary->id]);
        $contract = $this->baseStore($request);
        return $contract;
    }

    public function update($request)
    {
        $contract = $this->baseUpdate($request);
        return $contract;
    }

    public function getContract($request)
    {
        return $this->model->with([
            'contractType',
            'employee',
            'salary',
            'salaryInsurance'
        ])->where('id', $request['id'])
        ->first();
    }

    public function dateFields()
    {
        return ['start_date', 'end_date'];
    }
}
