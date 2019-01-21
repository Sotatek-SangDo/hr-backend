<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Interview;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Imports\InterviewImport;
use Excel;

class InterviewService
{
    public function __construct()
    {
    }

    public function getAll()
    {
        return Interview::all();
    }

    public function store($request)
    {
        return Interview::create([
            'candidate_id' => $request["candidate_id"],
            'started_at' => Carbon::createFromFormat('Y-m-d H:i', $request["started_at"])->toDateTimeString(),
            'ended_at' => Carbon::createFromFormat('Y-m-d H:i', $request["ended_at"])->toDateTimeString(),
            'interviewer' => $request["interviewer"],
            'address' => $request["address"]
        ]);
    }

    public function update($request)
    {
        $interview = Interview::findOrFail($request['id']);
        $interview->started_at = Carbon::parse($request['started_at'])->format('Y-m-d H:i');
        $interview->ended_at = Carbon::parse($request['ended_at'])->format('Y-m-d H:i');
        $interview->save();
        return $interview;
    }

    public function importExcelData(Request $request)
    {
        Excel::import(new InterviewImport, $request->file('file'));
    }
}
