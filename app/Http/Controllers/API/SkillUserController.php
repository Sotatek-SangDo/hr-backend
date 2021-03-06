<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\SkillUserService;

class SkillUserController extends Controller 
{
    private $skillUserService;

    public function __construct(SkillUserService $skillUserService)
    {
        $this->skillUserService = $skillUserService;
    }

    public function getAll()
    {
        $userSkills = $this->skillUserService->getAll();
        return response()->json($userSkills);
    }

    public function getEmpSkill(Request $request)
    {
        $userSkills = $this->skillUserService->getEmpSkill($request);
        return response()->json($userSkills);
    }

    public function store(Request $request)
    {
        $result = $this->skillUserService->store($request['data']);
        if ($result)
            return response()->json(['status'=> true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $result = $this->skillUserService->update($request['data']);
        if ($result)
            return response()->json(['status'=> true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        $result = $this->skillUserService->destroy($request);
        if ($result)
            return response()->json(['status'=> true, 'mess' => 'Thành công']);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);   
    }
}
