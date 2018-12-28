<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Candidate;
use Carbon\Carbon;

class CandidateService
{
    public function getAll($empID)
    {
        return Candidate::get();
    }

    public function getEmployeeEducation($request)
    {
        return Education::where('emp_id', $request["id"])->get();
    }

    public function store($data)
    {
        return Candidate::create([
            'job_id' => $data["job_id"],
            'email' => $data["email"],
            'name' => $data["name"],
            'gender' => $data["gender"],
            'birthday' => Carbon::createFromFormat('d-m-Y', $data["brithday"])->toDateString(),
            'phonenumber' => $data["phonenumber"],
            'description' => $data["description"]
        ]);
    }

    public function update($request)
    {
        $candidate = Education::findOrFail($request['id']);
        $candidate->job_id = $request['qualification_id'];
        $candidate->email = $request['emp_id'];
        $candidate->name = $request['institute'];
        $candidate->gender = $request['started_at'];
        $candidate->birthday = $request['ended_at'];
        $candidate->phonenumber = $request['phonenumber'];
        $candidate->description = $request['description'];
        $candidate->save();
        return $candidate;
    }
}
