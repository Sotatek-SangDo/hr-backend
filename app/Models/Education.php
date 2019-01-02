<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use DB;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'qualification_id',
        'emp_id',
        'institute',
        'started_at',
        'ended_at'
    ];

    protected $appends = [
        'qualification_name',
    ];

    public function getQualificationNameAttribute()
    {
        $qualification = DB::table('qualifications')->where('id', $this->qualification_id)->first();
        return $qualification ? $qualification->name : '';
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
