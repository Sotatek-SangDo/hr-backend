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
use App\Services\BaseService as Base;

class CandidateService extends Base
{
    private $applyService;

    public function __construct(AppliedJobStatusService $applyService, Candidate $model)
    {
        $this->applyService = $applyService;
        $this->model = $model;
    }

    public function getAll($request)
    {
        $query = $this->model->with(['appliedJobStatus', 'appliedJobStatus.recruitment']);
        return $this->basePaginate($request, $query);
    }

    public function getCandidateByRecruitment($request)
    {
        return $this->model->select('candidates.*', 'applied_jobs_status.status as status')
            ->join('applied_jobs_status', 'applied_jobs_status.candidate_id', '=', 'candidates.id')
            ->where('applied_jobs_status.recruitment_id', $request['recruitment_id'])
            ->get();
    }

    public function store($request)
    {
        $candidate = $this->baseStore($request);
        $this->applyService->store([
            'candidate_id' => $candidate->id,
            'recruitment_id' => $request['recruitment_id']
        ]);
        return $candidate;
    }

    public function dateFields()
    {
        return ['birthday'];
    }
}
