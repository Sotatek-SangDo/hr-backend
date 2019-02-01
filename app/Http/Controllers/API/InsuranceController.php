<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\InsuranceService;
use App\Http\Controllers\API\BaseController;

class InsuranceController extends BaseController
{
    public function __construct(InsuranceService $insuranceService)
    {
        $this->service = $insuranceService;
    }
}
