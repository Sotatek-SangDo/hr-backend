<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\AppliedJobStatus;
use App\Models\Recruitment;

class Candidate extends Model
{
    protected $table = "candidates";

    protected $fillable = [
        'job_id',
        'email',
        'name',
        'gender',
        'birthday',
        'phonenumber',
        'description'
    ];

    protected $appends = [
        'job_name'
    ];

    public function getJobNameAttribute()
    {
        $job = Job::findOrFail($this->job_id);
        return $job ? $job->title : '';
    }

    public function appliedJobStatus()
    {
        return $this->hasOne(AppliedJobStatus::class, 'candidate_id', 'id');
    }
}
