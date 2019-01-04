<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\InsurancePaymentService;

class InsurancePaymentController extends Controller 
{
    private $insurancePaymentService;

    public function __construct(InsurancePaymentService $insurancePaymentService)
    {
        $this->insurancePaymentService = $insurancePaymentService;
    }

    public function getAll()
    {
        $insurances = $this->insurancePaymentService->getAll();
        return response()->json($insurances);
    }

    public function store(Request $request)
    {
        $result = $this->insurancePaymentService->store($request['data']);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        $result = $this->insurancePaymentService->update($request['data']);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }
}
