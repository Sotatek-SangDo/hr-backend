<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\InsuranceService;

class InsuranceController extends Controller 
{
    private $insuranceService;

    public function __construct(InsuranceService $insuranceService)
    {
        $this->insuranceService = $insuranceService;
    }

    public function getAll()
    {
        $insurances = $this->insuranceService->getAll();
        return response()->json($insurances);
    }

    public function store(Request $request)
    {
        $result = $this->insuranceService->store($request['data']);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        $result = $this->insuranceService->update($request['data']);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function destroy(Request $request)
    {
        $result = $this->insuranceService->destroy($request);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }
}
