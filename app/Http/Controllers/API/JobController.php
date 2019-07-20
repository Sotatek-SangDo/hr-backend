<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\JobService;
use App\Http\Controllers\API\BaseController as Base;

class JobController extends Base
{
    public function __construct(JobService $jobService)
    {
        $this->service = $jobService;
    }
}
