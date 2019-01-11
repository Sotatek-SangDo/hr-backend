<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentPlan extends Model
{
    protected $table = "recruitment_plan";

    protected $fillable = [
    	'name',
        'job_id',
        'started_at',
        'ended_at',
        'num',
        'recruitment_required'
    ];
}
