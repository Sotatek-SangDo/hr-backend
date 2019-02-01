<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\UserLanguages;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class UserLanguageService extends Base
{
    public function __construct(UserLanguages $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $langs = $this->model->with(['employee'])
                ->select('languages_emp.*', 'employees.name as name')
                ->join('employees', 'languages_emp.emp_id', '=', 'employees.id')
                ->orderBy('name', 'DESC')
                ->get();
        return $langs;
            
    }

    public function getELanguage($request)
    {
        return $this->model->where('emp_id', $request['id'])->get();
    }
}
