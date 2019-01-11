<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RecruitmentPlanService;
use App\Models\RecruitmentPlan;

class RecruitmentPlanController extends Controller
{
    private $recruitmentPlanService;

    public function __construct(RecruitmentPlanService $recruitmentPlanService)
    {
        $this->recruitmentPlanService = $recruitmentPlanService;
    }

    public function getAll(Request $request)
    {
        $recruitmentsPlan = $this->recruitmentPlanService->getAll();
        return response()->json($recruitmentsPlan);
    }

    public function store(Request $request)
    {
        $result = $this->recruitmentPlanService->store($request->all());
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $recruitmentPlan = $this->recruitmentPlanService->update($request);
        if($recruitmentPlan)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $recruitmentPlan]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        try {
            $recruitmentPlan = RecruitmentPlan::findOrFail($request->id);
            $recruitmentPlan->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
