<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Recruitment;
use Carbon\Carbon;

class RecruitmentService
{
    public function getAll($empID)
    {
        return Recruitment::get();
    }

    public function store($data)
    {
        return Recruitment::create([
            'name' => $data["name"],
            'job_id' => $data["job_id"],
            'started_at' => Carbon::createFromFormat('d-m-Y', $data["started_at"])->toDateString(),
            'ended_at' => Carbon::createFromFormat('d-m-Y', $data["ended_at"])->toDateString(),
            'status' => $data["status"],
            'expired_at' => Carbon::createFromFormat('d-m-Y', $data["expired_at"])->toDateString(),
            'num' => $data["num"],
            'recruitment_required' => $data["recruitment_required"]
        ]);
    }

    public function update($request)
    {
        $rec = Recruitment::findOrFail($request['id']);
        $rec->name = $request['name'];
        $rec->job_id = $request['job_id'];
        $rec->started_at = $request['started_at'];
        $rec->ended_at = $request['ended_at'];
        $rec->status = $request['status'];
        $rec->expired_at  = $request['expired_at'];
        $rec->num = $request['num'];
        $rec->recruitment_required = $request['recruitment_required'];
        $rec->save();
        return $rec;
    }
}
