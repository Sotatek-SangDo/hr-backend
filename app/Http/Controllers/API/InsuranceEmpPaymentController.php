<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\InsuranceEmpPaymentService;

class InsuranceEmpPaymentController extends Controller 
{
    private $insuranceEmpPaymentService;

    public function __construct(InsuranceEmpPaymentService $insuranceEmpPaymentService)
    {
        $this->insuranceEmpPaymentService = $insuranceEmpPaymentService;
    }

    public function getAll(Request $request)
    {
        $details = $this->insuranceEmpPaymentService->getAll($request);
        return response()->json($details);
    }

    public function store(Request $request)
    {
        $result = $this->insuranceEmpPaymentService->store($request['data']);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        $result = $this->insuranceEmpPaymentService->update($request['data']);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }
}
