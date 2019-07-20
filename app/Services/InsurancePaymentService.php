<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\InsurancePayment;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class InsurancePaymentService extends Base
{
    public $model;

    public function __construct(InsurancePayment $model)
    {
        $this->model = $model;
    }
}
