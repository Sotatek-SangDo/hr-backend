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
        return true;
    }
}