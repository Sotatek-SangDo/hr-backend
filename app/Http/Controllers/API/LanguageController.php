<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LanguageService;
use App\Http\Controllers\API\BaseController;

class LanguageController extends BaseController
{
    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
    }
}
