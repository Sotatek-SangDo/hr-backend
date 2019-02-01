<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\Candidate;
use App\Services\CandidateService;

class CandidateController extends BaseController
{
    public function __construct(CandidateService $candidateService)
    {
        $this->service = $candidateService;
    }

    public function getCandidateByRecruitment(Request $request)
    {
        $candidates = $this->service->getCandidateByRecruitment($request->all());
        return response()->json($candidates);
    }
}
