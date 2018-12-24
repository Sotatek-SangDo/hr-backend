<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\CertificationUser;
use Carbon\Carbon;

class CertificationUserService
{
    public function getAll($empID)
    {
        return CertificationUser::where('emp_id', $empID)
            ->leftjoin('certifications', 'certification_user.certification_id', 'certifications.id')
            ->select('certifications.name','certification_user.*')
            ->get();
    }

    public function store($data)
    {
        return CertificationUser::create([
            'certification_id' => $data["certification_id"],
            'institute' => $data["institute"],
            'emp_id' => $data["emp_id"],
            'granted_on' => Carbon::createFromFormat('d-m-Y', $data["granted_on"])->toDateString(),
            'valid_to' => Carbon::createFromFormat('d-m-Y', $data["valid_to"])->toDateString()
        ]);
    }
}