<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\EmployeeHistory;

class HistoryEmployeeService
{
    public function store($employee)
    {
        $history = [
            'emp_id' => $employee->id,
            'department_id' => $employee->department_id,
            'job_id' => $employee->job_id,
            'paygrade_id' => $employee->paygrade_id,
            'status' => $employee->status
        ];

        EmployeeHistory:;updateOrCreate($history);
    }
}