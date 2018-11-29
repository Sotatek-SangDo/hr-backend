<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Skill;

class SkillService
{
    public function getAll()
    {
        return Skill::all();
    }
}