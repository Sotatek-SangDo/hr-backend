<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\EmployeeStatusService;
use App\Http\Controllers\API\BaseController;

class EmployeeStatusController extends BaseController
{
    public function __construct(EmployeeStatusService $employeeStatusService)
    {
        $this->service = $employeeStatusService;
    }
}
