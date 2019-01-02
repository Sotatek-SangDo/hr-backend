<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\SkillUser;
use App\Services\BaseService as Base;

class SkillUserService extends Base
{
    public function getAll()
    {
        $userSkills = SkillUser::with(['employee'])
                ->select('skill_user.*', 'employees.name as name')
                ->join('employees', 'skill_user.emp_id', '=', 'employees.id')
                ->orderBy('name', 'DESC')
                ->get();
        return $userSkills;
    }

    public function getEmpSkill($request)
    {
        return SkillUser::select('skill_user.id as id', 'emp_id', 'skill_id', 'detail', 'employees.name as name')
                ->join('employees', 'skill_user.emp_id', '=', 'employees.id')
                ->where('emp_id', $request['id'])
                ->get();
    }

    public function store($request)
    {
        return SkillUser::create([
            'emp_id' => $request['emp_id'],
            'skill_id' => $request['skill_id'],
            'detail' => $request['detail']
        ]);
    }

    public function update($request)
    {
        $skillUser = SkillUser::findOrFail($request['id']);
        $skillUser->skill_id = $request['skill_id'];
        $skillUser->detail = $request['detail'];
        $skillUser->save();
        return $skillUser;
    }

    public function destroy($request)
    {
        $skillUser = SkillUser::findOrFail($request->id);
        return $skillUser->delete();
    }
}
