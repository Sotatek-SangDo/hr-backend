<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserLanguageService;
use App\Models\UserLanguages;
use App\Http\Controllers\API\BaseController;

class UserLanguageController extends BaseController
{
    private $userLanguageService;

    public function __construct(UserLanguageService $userLanguageService)
    {
        $this->service = $userLanguageService;
    }

    public function getELanguage(Request $request)
    {
        $userLanguages = $this->service->getELanguage($request->all());
        return response()->json($userLanguages);
    }
}
