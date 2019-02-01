<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\AppliedJobStatus;
use Carbon\Carbon;
use App\Consts;
use App\Services\BaseService as Base;

class AppliedJobStatusService extends Base
{
    public function __construct(AppliedJobStatus $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        return AppliedJobStatus::create([
            'candidate_id' => $data['candidate_id'],
            'recruitment_id' => $data['recruitment_id'],
            'status' => AppliedJobStatus::APPLIED
        ]);
    }
}
