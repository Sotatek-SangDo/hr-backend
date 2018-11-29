<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\SkillUserService;

class SkillUserController extends Controller 
{
    private $skillUserService;

    public function __construct(SkillUserService $skillUserService)
    {
        $this->skillUserService = $skillUserService;
    }
}
