<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Skill;
use App\Services\BaseService as Base;

class SkillService extends Base
{
    public function __construct(Skill $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
