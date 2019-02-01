<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\SkillService;
use App\Http\Controllers\API\BaseController;

class SkillController extends BaseController
{
    public function __construct(SkillService $skillService)
    {
        $this->service = $skillService;
    }
}
