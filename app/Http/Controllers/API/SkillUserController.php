<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\SkillUserService;
use App\Http\Controllers\API\BaseController;

class SkillUserController extends BaseController
{
    public function __construct(SkillUserService $skillUserService)
    {
        $this->service = $skillUserService;
    }

    public function getEmpSkill(Request $request)
    {
        $userSkills = $this->service->getEmpSkill($request);
        return response()->json($userSkills);
    }
}
