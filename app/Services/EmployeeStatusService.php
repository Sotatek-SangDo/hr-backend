<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\EmployeeStatus;

class EmployeeStatusService
{
    public function getAll()
    {
        return EmployeeStatus::all();
    }
}