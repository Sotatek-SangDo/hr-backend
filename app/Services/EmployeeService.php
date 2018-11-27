<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeService
{
    public function getAll()
    {
        return Employee::all();
    }

    public function store($params)
    {
        logger(json_encode($params));
        return Employee::create([
            'name' => $params["full_name"],
            'work_email' => $params["email"],
            'nationality_id' => $params["nationality_id"],
            'country' => $params["country"],
            'ethnicity' => $params["ethnicity"],
            'private_email' => $params["private_email"],
            'address' => $params["address"],
            'joined_at' => Carbon::createFromFormat('d-m-Y', $params["joined_at"])->toDateString(),
            'phone' => $params["phone"],
            'gender' => $params["gender"],
            'birthday' => Carbon::createFromFormat('d-m-Y', $params["birthday"])->toDateString(),
            'marital_status' => $params["marital_status"],
            'confirmed_at' => Carbon::createFromFormat('d-m-Y', $params["confirmed_at"])->toDateString(),
            'supervisor_id' => 1,
            'department_id' => 1,//$params["department"],
            'paygrade_id' => $params["pay_grade"],
            'status' => $params["status"],
            'job_id' => $params["job"]
        ]);
    }
}