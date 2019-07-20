<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\PayGradeService;
use App\Http\Controllers\API\BaseController;

class PayGradeController extends BaseController
{
    private $payGradeService;

    public function __construct(PayGradeService $payGradeService)
    {
        $this->service = $payGradeService;
    }
}
