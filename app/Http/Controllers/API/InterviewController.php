<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Services\InterviewService;

class InterviewController extends Controller
{
    private $interviewService;

    public function __construct(InterviewService $interviewService)
    {
        $this->interviewService = $interviewService;
    }

    public function getAll()
    {
        $candidates = $this->interviewService->getAll();
        return response()->json($candidates);
    }

    public function store(Request $request)
    {
        $result = $this->interviewService->store($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $interview = $this->interviewService->update($request);
        if($interview)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $interview]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }
    public function importExcelData(Request $request)
    {
        $candidates = $this->interviewService->importExcelData($request);
        if ($candidates)
            return response()->json(['data' => $candidates, 'mess' => "thanh cong"]);
        return response()->json(['mess' => "Loi server"], 500);
    }
}
