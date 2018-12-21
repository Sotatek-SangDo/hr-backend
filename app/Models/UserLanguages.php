<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
