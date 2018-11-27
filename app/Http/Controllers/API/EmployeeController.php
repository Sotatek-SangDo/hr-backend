<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\EmployeeService;

class EmployeeController extends Controller 
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function getAll()
    {
        $employee = $this->employeeService->getAll();
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $result = $this->employeeService->store($params);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }
}
