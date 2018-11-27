<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{
    protected $table = 'pay_grade';

    protected $fillable = [
        'title', 'salary'
    ];

}
