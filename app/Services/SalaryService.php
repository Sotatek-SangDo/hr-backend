<?php

namespace App\Services;

use App\Models\Contract;
use App\Models\Salary;
use App\Services\BaseService as Base;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;

class SalaryService extends Base
{
    public function __construct(Salary $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['employee', 'insurance'])->whereNull('deleted_at');
        return $this->basePaginate($request, $query);
    }

    public function update($request)
    {
        $salary = $this->model->find($request->id);

        if (strval($salary->salary_basic) === $request->salary_basic) {
            $salary = $this->baseUpdate($request);
            return $salary;
        }
        $contract = Contract::where('salary_id', $salary->id)->first();

        $this->destroy($request);
        $params = $request->except('id');
        $salary = $this->model->create($params);

        $contract->salary_id = $salary->id;
        $contract->save();

        return $salary;
    }

    public function getSalary($request)
    {
        return $this->model->with([
            'employee',
            'insurance'
        ])->where('id', $request['id'])
        ->first();
    }

    public function dateFields()
    {
        return ['apply_date'];
    }
}
