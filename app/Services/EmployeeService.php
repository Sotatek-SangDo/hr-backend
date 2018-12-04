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

    public function store($data)
    {
        $params = $data['emp'];
        return Employee::create([
            'name' => $params["full_name"],
            'work_email' => $params["email"],
            'avatar' => $data['image'],
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

    public function update($data)
    {
        $params = $data['emp'];
        logger(json_encode($params));
        $emp = Employee::findOrFail($params['id']);
        $emp->name = $params['full_name'];
        $emp->work_email = $params['email'];
        if ($data['image']) {
            $emp->avatar = $data['image'];
        }
        $emp->nationality_id = $params['nationality_id'];
        $emp->country = $params['country'];
        $emp->ethnicity = $params['ethnicity'];
        $emp->private_email = $params['private_email'];
        $emp->address = $params['address'];
        $emp->joined_at = Carbon::parse($params["joined_at"])->toDateString();
        $emp->phone = $params['phone'];
        $emp->gender = $params['gender'];
        $emp->birthday = Carbon::parse($params['birthday'])->toDateString();
        $emp->marital_status = $params['marital_status'];
        $emp->confirmed_at = Carbon::parse($params['confirmed_at'])->toDateString();
        $emp->supervisor_id = 1;
        $emp->department_id = 1;//$params["department"],
        $emp->paygrade_id = $params["pay_grade"];
        $emp->status = $params['status'];
        $emp->job_id = $params['job'];
        $emp->save();
        return $emp;
    }

    public function getEmpFullInfo()
    {
        return Employee::with(['nationality', 'employeeStatus', 'payGrade', 'job'])->get();
    }
}