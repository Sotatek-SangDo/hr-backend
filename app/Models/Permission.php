<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Permission extends Model
{
    protected $table = 'permissions_router';

    protected $fillable = [
        'role',
        'gr_permissions',
        'priority'
    ];

    public function getMaxPriorityRole($roles)
    {
        $permission = DB::table('permissions_router')->where('priority', $this->getMaxPriority($roles))->first();
        return $permission;
    }

    private function getMaxPriority($roles)
    {
        return DB::table('permissions_router')->whereIn('role', $roles)->max('priority');
    }
}
