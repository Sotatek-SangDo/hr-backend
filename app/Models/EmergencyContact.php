<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = 'emergency_contacts';

    protected $fillable = [
        'emp_id',
        'full_name',
        'relationship',
        'contact_phone'
    ];
}
