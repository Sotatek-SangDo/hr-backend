<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Education;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class EducationService extends Base
{
    public function getAll($empID)
    {
        $educations = Education::with(['employee'])
                ->select('educations.*', 'employees.name as name')
                ->join('employees', 'educations.emp_id', '=', 'employees.id')
                ->orderBy('name')
                ->get();
        return $educations;
    }

    public function getEmployeeEducation($request)
    {
        return Education::where('emp_id', $request["id"])->get();
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

    public function update($request)
    {
        $educationUser = Education::findOrFail($request['id']);
        $educationUser->qualification_id = $request['qualification_id'];
        $educationUser->emp_id = $request['emp_id'];
        $educationUser->institute = $request['institute'];
        $educationUser->started_at = Carbon::parse($request['started_at'])->format('Y-m-d');
        $educationUser->ended_at = Carbon::parse($request['ended_at'])->format('Y-m-d');
        $educationUser->save();
        return $educationUser;
    }
}
