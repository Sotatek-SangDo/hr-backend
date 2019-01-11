<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentsRequest;

class DepartmentController extends Controller 
{
    private $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function getAll()
    {
        $departments = $this->departmentService->getAll();
        return response()->json($departments);
    }

    public function getEDepartment()
    {
        $departments = $this->departmentService->getEDepartment();
        return response()->json($departments);
    }

    public function store(Request $request)
    {
        $result = $this->departmentService->store($request->all());
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }
}
