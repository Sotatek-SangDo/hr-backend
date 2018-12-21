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

    public function getAll(Request $request)
    {
        $userLanguages = $this->userLanguageService->getAll($request->emp_id);
        return response()->json($userLanguages);
    }

    public function store(Request $request)
    {
        $result = $this->userLanguageService->store($request->all());
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        try {
            $userLanguages = UserLanguages::findOrFail($request['id']);
            $userLanguages->lang_id = $request['lang_id'];
            $userLanguages->emp_id = $request['emp_id'];
            $userLanguages->listen = $request['listen'];
            $userLanguages->speak = $request['speak'];
            $userLanguages->read = $request['read'];
            $userLanguages->write = $request['write'];
            $userLanguages->save();
            
            return response()->json(['status' => true]);
        } catch (Exception $e) {
             return response()->json(['status' => false]);
        }

    }

    public function destroy(Request $request)
    {
        try {
            $userLanguages = UserLanguages::findOrFail($request->id);
            $userLanguages->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
