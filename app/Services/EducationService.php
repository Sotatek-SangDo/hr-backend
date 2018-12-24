<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Education;
use Carbon\Carbon;

class EducationService
{
    public function getAll($empID)
    {
        return Education::where('emp_id', $empID)
            ->leftjoin('qualifications', 'educations.qualification_id', 'qualifications.id')
            ->select('qualifications.name','educations.*')
            ->get();
    }

    public function store($data)
    {
        return Education::create([
            'qualification_id' => $data["qualification_id"],
            'institute' => $data["institute"],
            'emp_id' => $data["emp_id"],
            'started_at' => Carbon::createFromFormat('d-m-Y', $data["started_at"])->toDateString(),
            'ended_at' => Carbon::createFromFormat('d-m-Y', $data["ended_at"])->toDateString()
        ]);
    }
}