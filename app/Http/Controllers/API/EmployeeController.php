<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\File;
use App\Services\UploadImageService;
use App\Http\Controllers\API\BaseController;

class EmployeeController extends BaseController
{
    private $uploadService;

    public function __construct(EmployeeService $employeeService, UploadImageService $uploadService)
    {
        $this->service = $employeeService;
        $this->uploadService = $uploadService;
    }

    public function getEmployee(Request $request)
    {
        $employee = $this->service->getEmployee($request);
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        $path = $this->service->hasFile($request) ? $this->uploadService->upload($request) : '';
        if (!$path) return response()->json(['status' => false]);
        $params = [
            'request' => $request,
            'avatar' => $path
        ];
        $result = $this->service->store($params);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        $path = $this->service->hasFile($request) ? $this->uploadService->upload($request) : '';
        $params = [
            'request' => $request,
            'avatar' => $path
        ];
        $result = $this->service->update($params);
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function getEmpFullInfo(Request $request)
    {
        $employees = $this->service->getEmpFullInfo($request);
        return response()->json($employees);
    }
}
