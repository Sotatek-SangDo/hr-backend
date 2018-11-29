<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\SkillService;

class SkillController extends Controller 
{
    private $skillUserService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    public function getAll()
    {
        $skills = $this->skillService->getAll();
        return response()->json($skills);
    }
}
