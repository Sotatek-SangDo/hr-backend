<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\AppliedJobStatus;
use Carbon\Carbon;

class AppliedJobStatusService
{
    public function getAll($empID)
    {
        return AppliedJobStatus::get();
    }

    public function store($data)
    {
        return AppliedJobStatus::create([
            'candidate_id' => $data['candidate_id'],
            'recruitment_id' => $data['recruitment_id'],
            'status' => AppliedJobStatus::APPLIED
        ]);
    }

    public function update($request)
    {
        $candidate = AppliedJobStatus::findOrFail($request['id']);
        $candidate->candidate_id = $request['candidate_id'];
        $candidate->emp_id = $request['emp_id'];
        $candidate->job_id = $request['job_id'];
        $candidate->status = $request['status'];
        $candidate->save();
        return $candidate;
    }
}
