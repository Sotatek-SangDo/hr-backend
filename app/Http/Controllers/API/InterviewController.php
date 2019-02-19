<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Services\InterviewService;
use App\Http\Controllers\API\BaseController;

class InterviewController extends BaseController
{
    public function __construct(InterviewService $interviewService)
    {
        $this->service = $interviewService;
    }

    public function importExcelData(Request $request)
    {
        $candidates = $this->service->importExcelData($request);
        if ($candidates)
            return response()->json(['data' => $candidates, 'mess' => "thanh cong"]);
        return response()->json(['mess' => "Loi server"], 500);
    }

    public function getInterviews()
    {
        $interviews = $this->service->getInterviews();
        return response()->json($interviews);
    }
}
