<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\PayGradeService;

class PayGradeController extends Controller 
{
    private $payGradeService;

    public function __construct(PayGradeService $payGradeService)
    {
        $this->payGradeService = $payGradeService;
    }

    public function getAll()
    {
        $payGrades = $this->payGradeService->getAll();
        return response()->json($payGrades);
    }
}
