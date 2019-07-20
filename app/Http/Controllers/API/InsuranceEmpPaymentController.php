<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\InsuranceEmpPaymentService;
use App\Http\Controllers\API\BaseController as Base;

class InsuranceEmpPaymentController extends Base
{
    public function __construct(InsuranceEmpPaymentService $insuranceEmpPaymentService)
    {
        $this->service = $insuranceEmpPaymentService;
    }
}
