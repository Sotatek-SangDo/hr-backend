<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\CertificationService;
use App\Http\Controllers\API\BaseController;

class CertificationController extends BaseController
{
    public function __construct(CertificationService $certificationService)
    {
        $this->service = $certificationService;
    }
}
