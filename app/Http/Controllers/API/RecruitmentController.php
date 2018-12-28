<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Service\RecruitmentService;

class RecruitmentController extends Controller
{
    private $recruitmentService;

    public function __construct(RecruitmentService $recruitmentService)
    {
        $this->recruitmentService = $recruitmentService;
    }

    public function getAll(Request $request)
    {
        $recruitments = $this->recruitmentService->getAll();
        return response()->json($recruitments);
    }

    public function store(Request $request)
    {
        $result = $this->recruitmentService->store($request->all());
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $recruitment = $this->recruitmentService->update($request);
        if($recruitment)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $recruitment]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        try {
            $recruitment = Candidate::findOrFail($request->id);
            $recruitment->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
