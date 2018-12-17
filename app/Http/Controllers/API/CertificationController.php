<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CertificationService;

class CertificationController extends Controller
{
    private $certificationService;

    public function __construct(CertificationService $certificationService)
    {
        $this->certificationService = $certificationService;
    }

    public function getAll()
    {
        $certifications = $this->certificationService->getAll();
        return response()->json($certifications);
    }
}
