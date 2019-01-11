<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppliedJobStatus;
use App\Service\AppliedJobStatusService;

class AppiedJobController extends Controller
{
    private $appliedJobStatusService;

    public function __construct(AppliedJobStatusService $appliedJobStatusService)
    {
        $this->appliedJobStatusService = $appliedJobStatusService;
    }

    public function getAll(Request $request)
    {
        $appliedJobs = $this->appliedJobStatusService->getAll();
        return response()->json($appliedJobs);
    }

    public function store(Request $request)
    {
        $result = $this->appliedJobStatusService->store($request->all());
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $appliedJob = $this->appliedJobStatusService->update($request);
        if($appliedJob)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $appliedJob]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        try {
            $appliedJob = Candidate::findOrFail($request->id);
            $appliedJob->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
