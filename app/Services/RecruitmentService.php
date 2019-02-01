<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Recruitment;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class RecruitmentService extends Base
{
    public function __construct(Recruitment $model)
    {
        $this->model = $model;
    }

    public function dateFields()
    {
        return ['started_at', 'ended_at', 'expired_at'];
    }
}
