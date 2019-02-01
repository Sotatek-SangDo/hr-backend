<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\NationalityService;

class NationalityController extends Controller 
{
    public function __construct(NationalityService $nationalityService)
    {
        $this->service = $nationalityService;
    }
}
