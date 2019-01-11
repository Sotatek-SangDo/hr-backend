<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppliedJobStatus extends Model
{
	const PENDING = "pending";
	const APPLIED = "applied";
	const REJECT = "reject";
	
    protected $table = "applied_job_status";

    protected $fillable = [
        'candidate_id',
        'emp_id',
        'job_id',
        'status',
    ];
}
