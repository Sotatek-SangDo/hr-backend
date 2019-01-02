<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Employee;

class CertificationUser extends Model
{
    protected $table = 'certification_user';

    protected $fillable = [
        'certification_id',
        'emp_id',
        'institute',
        'granted_on',
        'valid_to'
    ];

    protected $appends = [
        'certification_name',
    ];

    public function getCertificationNameAttribute()
    {
        $certification = DB::table('certifications')->where('id', $this->certification_id)->first();
        return $certification ? $certification->name : '';
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
