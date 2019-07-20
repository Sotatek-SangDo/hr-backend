<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\AppliedJobStatus;
use App\Services\AppliedJobStatusService;

class AppiedJobController extends BaseController
{
    public function __construct(AppliedJobStatusService $appliedJobStatusService)
    {
        $this->service = $appliedJobStatusService;
    }
}
