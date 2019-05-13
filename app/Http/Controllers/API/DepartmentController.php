<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentsRequest;

class DepartmentController extends BaseController
{
    public function __construct(DepartmentService $departmentService)
    {
        $this->service = $departmentService;
    }

    public function getEDepartment()
    {
        $departments = $this->service->getEDepartment();
        return response()->json($departments);
    }

    public function getDepartment(Request $request)
    {
        return response()->json($this->service->getDepartment($request));
    }
}
