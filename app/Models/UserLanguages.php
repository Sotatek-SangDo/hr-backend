<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Employee;

class UserLanguages extends Model
{
    protected $table = 'languages_emp';

    protected $fillable = [
        'lang_id',
        'emp_id',
        'listen',
        'speak',
        'read',
        'write'
    ];

    protected $appends = [
        'language',
    ];

    public function getLanguageAttribute()
    {
        $lang = DB::table('languages')->where('id', $this->lang_id)->first();
        return $lang ? $lang->sign : '';
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
