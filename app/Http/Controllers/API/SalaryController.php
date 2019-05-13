<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Services\SalaryService;
use Illuminate\Http\Request;

class SalaryController extends BaseController
{
    public function __construct(SalaryService $salaryService)
    {
        $this->service = $salaryService;
    }

    public function getSalary(Request $request)
    {
        $salary = $this->service->getSalary($request);
        return response()->json($salary);
    }
}
