<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\CertificationUser;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class CertificationUserService extends Base
{
    public function __construct(CertificationUser $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['employee'])
                ->select('certification_user.*', 'employees.name as name')
                ->join('employees', 'certification_user.emp_id', '=', 'employees.id');
        return $this->basePaginate($request, $query);
    }

    public function getECertification($request)
    {
        return $this->model->where('emp_id', $request['id'])->get();
    }

    public function dateFields()
    {
        return ['granted_on', 'valid_to'];
    }
}
