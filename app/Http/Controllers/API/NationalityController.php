<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\NationalityService;

class NationalityController extends Controller 
{
    private $nationalityService;

    public function __construct(NationalityService $nationalityService)
    {
        $this->nationalityService = $nationalityService;
    }

    public function getAll()
    {
        $nationalities = $this->nationalityService->getAll();
        return response()->json($nationalities);
    }
}
