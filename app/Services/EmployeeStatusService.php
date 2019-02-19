<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\EmployeeStatus;
use App\Services\BaseService as Base;

class EmployeeStatusService extends Base
{
    public function __construct(EmployeeStatus $model)
    {
        $this->model = $model;
    }
}
