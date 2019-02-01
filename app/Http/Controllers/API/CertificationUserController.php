<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CertificationUserService;
use App\Models\CertificationUser;
use Carbon\Carbon;
use App\Http\Controllers\API\BaseController;

class CertificationUserController extends BaseController
{
    public function __construct(CertificationUserService $certificationUserService)
    {
        $this->service = $certificationUserService;
    }

    public function getECertification(Request $request)
    {
        $certifications = $this->service->getECertification($request);
        return response()->json($certifications);
    }
}
