<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EducationService;
use App\Models\Education;

class EducationController extends Controller
{
    private $educationService;

    public function __construct(EducationService $educationService)
    {
        $this->educationService = $educationService;
    }

    public function getAll(Request $request)
    {
        $educations = $this->educationService->getAll($request->emp_id);
        return response()->json($educations);
    }

    public function getEmployeeEducation(Request $request)
    {
        $educations = $this->educationService->getEmployeeEducation($request);
        return response()->json($educations);
    }

    public function store(Request $request)
    {
        $result = $this->educationService->store($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $edu = $this->educationService->update($request['data']);
        if($edu)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $edu]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        try {
            $educationUser = Education::findOrFail($request->id);
            $educationUser->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
