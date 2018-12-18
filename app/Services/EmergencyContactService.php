<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\EmergencyContact;

class EmergencyContactService
{
    public function getAll($empID)
    {
        return EmergencyContact::where('emp_id', $empID)->get();
    }

    public function store($data)
    {
        return EmergencyContact::create([
            'emp_id' => $data["emp_id"],
            'full_name' => $data["full_name"],
            'relationship' => $data["relationship"],
            'contact_phone' => $data["contact_phone"]
        ]);
    }
}