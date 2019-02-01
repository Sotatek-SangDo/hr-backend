<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\JobService;

class JobController extends Controller 
{
    public function __construct(JobService $jobService)
    {
        $this->service = $jobService;
    }
}
