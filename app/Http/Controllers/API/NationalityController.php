<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\NationalityService;
use App\Http\Controllers\API\BaseController as Base;

class NationalityController extends Base
{
    public function __construct(NationalityService $nationalityService)
    {
        $this->service = $nationalityService;
    }
}
