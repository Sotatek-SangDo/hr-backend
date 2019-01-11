<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserLanguageService;
use App\Models\UserLanguages;

class UserLanguageController extends Controller
{
    private $userLanguageService;

    public function __construct(UserLanguageService $userLanguageService)
    {
        $this->userLanguageService = $userLanguageService;
    }

    public function getAll()
    {
        $userLanguages = $this->userLanguageService->getAll();
        return response()->json($userLanguages);
    }

    public function getELanguage(Request $request)
    {
        $userLanguages = $this->userLanguageService->getELanguage($request->all());
        return response()->json($userLanguages);
    }

    public function store(Request $request)
    {
        $result = $this->userLanguageService->store($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $result = $this->userLanguageService->update($request['data']);    
            return response()->json(['status' => true, 'mess', 'Thành Công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        $result = $this->userLanguageService->destroy($request->all());    
            return response()->json(['status' => true, 'mess' => 'Thành công']);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }
}
