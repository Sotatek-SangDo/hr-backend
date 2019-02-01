<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\InsuranceEmployeePayment;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class InsuranceEmpPaymentService extends Base
{
    public function __construct(InsuranceEmployeePayment $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->select('insurance_employee_payment.*', 'employees.name as name')
            ->join('employees', 'employees.id', '=', 'insurance_employee_payment.emp_id')
            ->where('ip_id', $request['id']);
        return $this->basePaginate($request, $query);
    }
}
