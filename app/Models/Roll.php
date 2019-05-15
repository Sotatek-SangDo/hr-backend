<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roll extends Model
{
    protected $table = 'rolls';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_roll');
    }
}
