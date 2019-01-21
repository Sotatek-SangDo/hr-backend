<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\File;
use App\Services\UploadImageService;

class EmployeeController extends Controller
{
    private $employeeService;
    private $uploadService;

    public function __construct(EmployeeService $employeeService, UploadImageService $uploadService)
    {
        $this->employeeService = $employeeService;
        $this->uploadService = $uploadService;
    }

    public function getAll()
    {
        $employee = $this->employeeService->getAll();
        return response()->json($employee);
    }

    public function getEmployee(Request $request)
    {
        $employee = $this->employeeService->getEmployee($request);
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        $path = $this->uploadService->upload($request);
        if (!$path) return response()->json(['status' => false]); 
        $params = [
            'emp' => $request->all(),
            'image' => $path
        ];
        $result = $this->employeeService->store($params);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        $path = $this->uploadService->upload($request);
        $params = [
            'emp' => $request->all(),
            'image' => $path
        ];
        $result = $this->employeeService->update($params);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function getEmpFullInfo()
    {
        $employees = $this->employeeService->getEmpFullInfo();
        return response()->json($employees);
    }
}
