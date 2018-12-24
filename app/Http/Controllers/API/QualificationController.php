<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QualificationService;

class QualificationController extends Controller
{
    private $qualificationService;

    public function __construct(QualificationService $qualificationService)
    {
        $this->qualificationService = $qualificationService;
    }

    public function getAll()
    {
        $qualifications = $this->qualificationService->getAll();
        return response()->json($qualifications);
    }
}
