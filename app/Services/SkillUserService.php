<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\SkillUser;
use App\Services\BaseService as Base;

class SkillUserService extends Base
{
    public function __construct(SkillUser $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $userSkills = $this->model->with(['employee'])
                ->select('skill_user.*', 'employees.name as name')
                ->join('employees', 'skill_user.emp_id', '=', 'employees.id')
                ->orderBy('name', 'DESC')
                ->get();
        return $userSkills;
    }

    public function getEmpSkill($request)
    {
        return $this->model->select('skill_user.id as id', 'emp_id', 'skill_id', 'detail', 'employees.name as name')
                ->join('employees', 'skill_user.emp_id', '=', 'employees.id')
                ->where('emp_id', $request['id'])
                ->get();
    }
}
