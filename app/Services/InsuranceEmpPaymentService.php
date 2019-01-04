<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\InsuranceEmployeePayment;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class InsuranceEmpPaymentService extends Base
{
    public function getAll($request)
    {
        return InsuranceEmployeePayment::select('insurance_employee_payment.*', 'employees.name as name')
            ->join('employees', 'employees.id', '=', 'insurance_employee_payment.emp_id')
            ->where('ip_id', $request['id'])->get();
    }

    public function store($request)
    {
        return InsuranceEmployeePayment::create([
            'ip_id' => $request['ip_id'],
            'emp_id' => $request['emp_id'],
            'reason_leave' => $request['reason_leave'],
            'num_social_security' => $request['num_social_security'],
            'num_day_leave' => $request['num_day_leave'],
            'insurance_money' => $request['insurance_money'],
            'amount' => $request['amount'],
            'notes' => $request['notes']
        ]);
    }

    public function update($request)
    {
        $detail = InsuranceEmployeePayment::findOrFail($request['id']);
        $detail->ip_id = $request['ip_id'];
        $detail->emp_id = $request['emp_id'];
        $detail->reason_leave = $request['reason_leave'];
        $detail->num_social_security = $request['num_social_security'];
        $detail->num_day_leave = $request['num_day_leave'];
        $detail->insurance_money = $request['insurance_money'];
        $detail->amount = $request['amount'];
        $detail->notes = $request['notes'];
        $detail->save();
        return $detail;
    }
}
