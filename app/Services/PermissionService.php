<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Permission;
use App\Models\GroupPermission;
use App\Consts;

class PermissionService
{
    private $permission;
    private $groupPermission;

    public function __construct(Permission $permission, GroupPermission $groupPermission)
    {
        $this->permission = $permission;
        $this->groupPermission = $groupPermission;
    }

    public function getPermissions($request)
    {
        $permission = [];
        $role = $this->getPrioritizeRole($request['roles']);
        $group = $role->gr_permissions === Consts::FULL
            ? $role->gr_permissions
            : json_decode($role->gr_permissions);
        $grPermissions = $this->getGroupPermissions($group);
        return $this->parsePermissions($grPermissions);
    }

    private function parsePermissions($list)
    {
        $parents = $this->getParents($list);
        $permissions = [];
        foreach($parents as $parent) {
            $p = [];
            $p['component'] = camel_case($parent);
            $p['children'] = [];
            foreach ($list as $l) {
                if ( str_prefix($l) === $parent ) {
                    array_push($p['children'], [ 'component' => camel_case( str_subfix($l) ) ]);
                }
            }
            array_push($permissions, $p);
        }
        return $permissions;
    }

    private function getParents($list)
    {
        $data = [];
        collect($list)->each(function($i, $k) use (&$data) {
            array_push($data, str_prefix($i));
        });
        return array_unique($data);
    }

    private function getPrioritizeRole($roles)
    {
        return $this->permission->getMaxPriorityRole($roles);
    }

    private function getGroupPermissions($group)
    {
        $groupPermissions = $group === Consts::FULL
                ? $this->groupPermission->all()
                : $this->groupPermission->whereIn('role', $group)->get();
        return $this->getListPermissions($groupPermissions);
    }

    private function getListPermissions($groupPermissions)
    {
        $per = [];
        collect($groupPermissions)->each(function($v, $key) use (&$per) {
            $per = array_merge($per, json_decode($v->permissions));
        });
        return $per;
    }
}
