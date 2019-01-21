<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;
use App\Models\Employee;

class Interview extends Model
{
    protected $table = "interviews";

    protected $fillable = [
        'candidate_id',
        'started_at',
        'ended_at',
        'address',
        'interviewer'
    ];

    protected $appends = [
        'name',
        'interviewer_name'
    ];

    public function getNameAttribute()
    {
        $candidate = Candidate::findOrFail($this->candidate_id);
        return $candidate ? $candidate->name : '';
    }

    public function getInterviewerNameAttribute()
    {
        $emp = Employee::findOrFail($this->interviewer);
        return $emp ? $emp->name : '';
    }
}
