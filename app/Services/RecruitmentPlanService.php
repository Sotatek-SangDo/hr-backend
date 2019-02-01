<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\RecruitmentPlan;
use Carbon\Carbon;

class RecruitmentPlanService
{
    public function __construct(RecruitmentPlan $model)
    {
        $this->model = $model;
    }

    public function dateFields()
    {
        return ['started_at', 'ended_at'];
    }
}
