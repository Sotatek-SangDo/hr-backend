<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use DB;

class SkillUser extends Model
{
    protected $table = 'skill_user';

    protected $fillable = [
        'emp_id',
        'skill_id',
        'detail'
    ];
    
    protected $appends = [
        'skill',
    ];

    public function getSkillAttribute()
    {
        $skill = DB::table('skills')->where('id', $this->skill_id)->first();
        return $skill ? $skill->skill_name : '';
    }
}
