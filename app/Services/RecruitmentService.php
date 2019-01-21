<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Recruitment;
use Carbon\Carbon;

class RecruitmentService
{
    public function getAll()
    {
        return Recruitment::all();
    }

    public function store($request)
    {
        return Recruitment::create([
            'name' => $request["name"],
            'started_at' => Carbon::createFromFormat('d-m-Y', $request["started_at"])->toDateString(),
            'ended_at' => Carbon::createFromFormat('d-m-Y', $request["ended_at"])->toDateString(),
            'status' => $request["status"],
            'expired_at' => Carbon::createFromFormat('d-m-Y', $request["expired_at"])->toDateString(),
            'num' => $request["num"],
            'recruitment_required' => $request["recruitment_required"]
        ]);
    }

    public function update($request)
    {
        $rec = Recruitment::findOrFail($request['id']);
        $rec->name = $request['name'];
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
