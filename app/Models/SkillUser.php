<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    protected $table = 'skill_user';

    protected $fillable = [
        'emp_id',
        'skill_id',
        'detail'
    ];

}
