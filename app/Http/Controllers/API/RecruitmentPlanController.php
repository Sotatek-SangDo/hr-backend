<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RecruitmentPlanService;
use App\Models\RecruitmentPlan;
use App\Http\Controllers\API\BaseController;

class RecruitmentPlanController extends BaseController
{
    public function __construct(RecruitmentPlanService $recruitmentPlanService)
    {
        $this->service = $recruitmentPlanService;
    }
}
