<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EducationService;
use App\Models\Education;
use App\Http\Controllers\API\BaseController;

class EducationController extends BaseController
{
    public function __construct(EducationService $educationService)
    {
        $this->service = $educationService;
    }

    public function getEmployeeEducation(Request $request)
    {
        $educations = $this->educationService->getEmployeeEducation($request);
        return response()->json($educations);
    }
}
