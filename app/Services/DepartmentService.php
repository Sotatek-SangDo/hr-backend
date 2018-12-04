<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Department;
use Carbon\Carbon;

class DepartmentService
{
    public function getAll()
    {
        return Department::all();
    }

    public function store($data)
    {
        return Department::create([
            'name' => $data["name"],
            'email' => $data["email"],
            'phone_number' => $data['phone_number']
        ]);
    }
}