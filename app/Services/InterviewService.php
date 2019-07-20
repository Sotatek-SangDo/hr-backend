<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Interview;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Imports\InterviewImport;
use Excel;
use App\Services\BaseService;

class InterviewService extends BaseService
{
    public function __construct(Interview $model)
    {
        $this->model = $model;
    }

    public function getInterviews()
    {
        return $this->getList();
    }

    public function dateFields()
    {
        return ['started_at', 'ended_at'];
    }
}
