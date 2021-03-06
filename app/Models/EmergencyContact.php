<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class EmergencyContact extends Model
{
    protected $table = 'emergency_contacts';

    protected $fillable = [
        'emp_id',
        'full_name',
        'relationship',
        'contact_phone'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
