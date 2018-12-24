<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Employee;
use Carbon\Carbon;
use App\Services\HistoryEmployeeService as History;

class EmployeeService
{
    private $history;

    public function __construct(History $history)
    {
        $this->history = $history;
    }

    public function getAll()
    {
        return Employee::all();
    }

    public function store($data)
    {
        $params = $data['emp'];

        $emp = Employee::create([
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
            'department_id' => $params["department"],
            'paygrade_id' => $params["pay_grade"],
            'status' => $params["status"],
            'job_id' => $params["job"]
        ]);
        //store history emp
        $this->history->store($emp);

        return $emp;
    }

    public function update($data)
    {
        $params = $data['emp'];
        $isChange = Employee::where('id', $params['id'])
                        ->where('department_id', $params["department"])
                        ->where('job_id', $params['job'])
                        ->where('paygrade_id', $params["pay_grade"])
                        ->where('status', $params['status'])
                        ->count();
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
        $emp->department_id = $params["department"];
        $emp->paygrade_id = $params["pay_grade"];
        $emp->status = $params['status'];
        $emp->job_id = $params['job'];
        $emp->save();

        //srore history
        if (!$isChange) {
            $this->history->store($emp);
        }
        return $emp;
    }

    public function getEmpFullInfo()
    {
        return Employee::with(['nationality', 'employeeStatus', 'payGrade', 'job'])->get();
    }
}