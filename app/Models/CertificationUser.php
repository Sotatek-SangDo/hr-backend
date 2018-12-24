<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
