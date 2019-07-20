<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\InsurancePaymentService;
use App\Http\Controllers\API\BaseController;

class InsurancePaymentController extends BaseController
{
    public function __construct(InsurancePaymentService $insurancePaymentService)
    {
        $this->service = $insurancePaymentService;
    }
}
