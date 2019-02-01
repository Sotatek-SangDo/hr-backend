<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\EmergencyContact;
use App\Services\BaseService as Base;

class EmergencyContactService extends Base
{
    public function __construct(EmergencyContact $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $contacts = $this->model->with(['employee'])
                ->select('emergency_contacts.*', 'employees.name as name')
                ->join('employees', 'emergency_contacts.emp_id', '=', 'employees.id')
                ->orderBy('name', 'DESC')
                ->get();
        return $contacts;
    }

    public function getEEmergencyContact($request)
    {
        return $this->model->where('emp_id', $request['id'])->get();
    }
}
