<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\AppliedJobStatusService;
use Illuminate\Support\Facades\File;
use App\Imports\CandidatesImport;
use Excel;

class CandidateService
{
    private $applyService;

    public function __construct(AppliedJobStatusService $applyService)
    {
        $this->applyService = $applyService;
    }

    public function getAll()
    {
        return Candidate::with(['appliedJobStatus', 'appliedJobStatus.recruitment'])->get();
    }

    public function getCandidateByRecruitment($request)
    {
        return Candidate::select('candidates.*', 'applied_jobs_status.status as status')
            ->join('applied_jobs_status', 'applied_jobs_status.candidate_id', '=', 'candidates.id')
            ->where('applied_jobs_status.recruitment_id', $request['recruitment_id'])
            ->get();
    }

    public function store($request)
    {
        $candidate = Candidate::create([
            'job_id' => $request["job_id"],
            'email' => $request["email"],
            'name' => $request["name"],
            'gender' => $request["gender"],
            'birthday' => Carbon::createFromFormat('d-m-Y', $request["birthday"])->toDateString(),
            'phonenumber' => $request["phonenumber"],
            'description' => $request["description"]
        ]);
        $this->applyService->store([
            'candidate_id' => $candidate->id,
            'recruitment_id' => $request['recruitment_id']
        ]);
        return $candidate;
    }

    public function update($request)
    {
        $candidate = Candidate::findOrFail($request['id']);
        $candidate->job_id = $request["job_id"];
        $candidate->email = $request["email"];
        $candidate->name = $request["name"];
        $candidate->gender = $request["gender"];
        $candidate->phonenumber = $request['phonenumber'];
        $candidate->birthday = Carbon::parse($request['birthday'])->format('Y-m-d');
        $candidate->description = $request['description'];
        $candidate->save();
        return $candidate;
    }

    public function importExcelData(Request $request)
    {
        Excel::import(new CandidatesImport, $request->file('file'));
        // $file = $request->excel;
        // if (is_file($file)) {
        //     $excel = File::get($$request->excel);
        // }
    }
}
