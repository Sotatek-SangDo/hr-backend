<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EducationService;

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

    public function update($request)
    {
        $skillUser = SkillUser::findOrFail($request['id']);
        $skillUser->skill_id = $request['skill_id'];
        $skillUser->detail = $request['detail'];
        $skillUser->save();
        return $skillUser;
    }

    public function destroy($request)
    {
        $skillUser = SkillUser::findOrFail($request->id);
        return $skillUser->delete();
    }
}
