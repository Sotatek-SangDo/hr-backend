<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Services\SalaryBusinessService;
use Illuminate\Http\Request;

class SalaryBusinessController extends BaseController
{
    public function __construct(SalaryBusinessService $salaryBusinessService)
    {
        $this->service = $salaryBusinessService;
    }

    public function getSalaryBusiness(Request $request)
    {
        $salaryBusiness = $this->service->getSalaryBusiness($request);
        return response()->json($salaryBusiness);
    }
}
