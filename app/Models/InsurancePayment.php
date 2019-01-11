<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InsurancePayment extends Model
{
    protected $table = 'insurance_payments';

    protected $fillable = [
        'title',
        'time'
    ];

    protected $appends = [
        'name'
    ];

    public function setTimeAttribute($v)
    {
        $this->attributes['time'] = Carbon::parse($v)->format('Y-m-d');
    }

    public function getNameAttribute()
    {
        return $this->title;
    }
}
