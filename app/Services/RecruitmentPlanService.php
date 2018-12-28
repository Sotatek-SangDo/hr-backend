<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\RecruitmentPlan;
use Carbon\Carbon;

class RecruitmentPlanService
{
    public function getAll($empID)
    {
        return RecruitmentPlan::get();
    }

    public function store($data)
    {
        return RecruitmentPlan::create([
            'name' => $data["name"],
            'job_id' => $data["job_id"],
            'started_at' => Carbon::createFromFormat('d-m-Y', $data["started_at"])->toDateString(),
            'ended_at' => Carbon::createFromFormat('d-m-Y', $data["ended_at"])->toDateString(),
            'num' => $data["num"],
            'recruitment_required' => $data["recruitment_required"]
        ]);
    }

    public function update($request)
    {
        $rec = RecruitmentPlan::findOrFail($request['id']);
        $rec->name = $request['name'];
        $rec->job_id = $request['job_id'];
        $rec->started_at = $request['started_at'];
        $rec->ended_at = $request['ended_at'];
        $rec->num = $request['num'];
        $rec->recruitment_required = $request['recruitment_required'];
        $rec->save();
        return $rec;
    }
}
