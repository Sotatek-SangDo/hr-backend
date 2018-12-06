<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Department;
use Carbon\Carbon;

class QualificationService
{
    public function getAll()
    {
        return DB::table('qualifications')->get();
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