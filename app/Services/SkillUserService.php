<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\SkillUser;

class SkillUserService
{
    public function getAll()
    {
        return SkillUser::all();
    }

    public function store($request)
    {
        return SkillUser::create([
            'emp_id' => $request['emp_id'],
            'skill_id' => $request['skill_id'],
            'detail' => $request['detail']
        ]);
    }

    public function destroy($request)
    {
        $skillUser = SkillUser::findOrFail($request->id);
        return $skillUser->delete();
    }
}