<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recruitment;

class AppliedJobStatus extends Model
{
	const WAITING = "Chờ phỏng vấn";
	const APPLIED = "Ứng tuyển";
    const REJECT = "Từ chối";
    const OK = "Nhận";
    
    protected $table = "applied_jobs_status";

    protected $fillable = [
        'candidate_id',
        'recruitment_id',
        'status',
    ];

    public function recruitment()
    {
        return $this->hasOne(Recruitment::class, 'id', 'recruitment_id');
    }
}
