<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentRoll extends Model
{
    use SoftDeletes;
    protected $table = 'department_roll';
}
