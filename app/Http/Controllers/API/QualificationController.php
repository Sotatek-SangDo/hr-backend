<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QualificationService;
use App\Http\Controllers\API\BaseController;

class QualificationController extends BaseController
{
    private $qualificationService;

    public function __construct(QualificationService $qualificationService)
    {
        $this->service = $qualificationService;
    }
}
