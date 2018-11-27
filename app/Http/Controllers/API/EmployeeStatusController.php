<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\EmployeeStatusService;

class EmployeeStatusController extends Controller 
{
    private $employeeStatusService;

    public function __construct(EmployeeStatusService $employeeStatusService)
    {
        $this->employeeStatusService = $employeeStatusService;
    }

    public function getAll()
    {
        $status = $this->employeeStatusService->getAll();
        return response()->json($status);
    }
}
