<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Service\CandidateService;

class CandidateController extends Controller
{
    private $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function getAll(Request $request)
    {
        $candidates = $this->candidateService->getAll();
        return response()->json($candidates);
    }

    public function store(Request $request)
    {
        $result = $this->candidateService->store($request->all());
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $candidate = $this->candidateService->update($request);
        if($candidate)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $candidate]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        try {
            $candidate = Candidate::findOrFail($request->id);
            $candidate->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
