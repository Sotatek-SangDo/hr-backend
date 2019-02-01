<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Employee;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class EmployeeService extends Base
{
    public $avatar;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function store($params)
    {
        $this->avatar = $params['avatar'];
        return $this->baseStore($params['request']);
    }

    public function update($params)
    {
        $request = $params['request'];
        if ($parmas['avatar']) {
            $this->avatar = $params['avatar'];
        }
        return $this->baseUpdate($request);
    }

    public function getEmpFullInfo()
    {
        return Employee::with(['nationality', 'employeeStatus', 'payGrade', 'job', 'certifications', 'skills', 'educations', 'languages', 'emergencyContracts'])->get();
    }

    public function getEmployee($request)
    {
        return Employee::with([
            'nationality',
            'employeeStatus',
            'payGrade',
            'job',
            'certifications',
            'skills',
            'educations',
            'languages',
            'emergencyContracts'
        ])->where('id', $request['id'])
        ->first();
    }

    public function dateFields()
    {
        return ['joined_at', 'confirmed_at', 'birthday'];
    }

    public function except()
    {
        return [
            'key' => ['avatar'],
            'value' => [
                'avatar' => $this->avatar
            ]
        ];
    }
}
