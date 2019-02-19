<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Services\RecruitmentService;
use App\Http\Controllers\API\BaseController;

class RecruitmentController extends BaseController
{
    public function __construct(RecruitmentService $recruitmentService)
    {
        $this->service = $recruitmentService;
    }
}
