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

    public function store(Request $request)
    {
        $result = $this->educationService->store($request->all());
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        try {
            $educationUser = Education::findOrFail($request['id']);
            $educationUser->qualification_id = $request['qualification_id'];
            $educationUser->emp_id = $request['emp_id'];
            $educationUser->institute = $request['institute'];
            $educationUser->started_at = $request['started_at'];
            $educationUser->ended_at = $request['ended_at'];
            $educationUser->save();
            
            return response()->json(['status' => true]);
        } catch (Exception $e) {
             return response()->json(['status' => false]);
        }

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
