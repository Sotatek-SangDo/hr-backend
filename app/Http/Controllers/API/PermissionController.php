<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(Request $request)
    {
        $permissions = $this->permissionService->getPermissions($request);
        return json_encode($permissions);
        return json_encode([
            [
                'component' => 'syncEmployee',
                'children' => [
                    [
                        'component' => 'childSyncEmployee'
                    ],
                    [
                        'component' => 'addEmployee'
                    ],
                    [
                        'component' => 'employeeProfile'
                    ],
                    [
                        'component' => 'employeeEdit'
                    ]
                ]
            ],
            [
                'component' => 'syncInsurance',
                'children' => [
                    [
                        'component' => 'insuranceIndex'
                    ],
                    [
                        'component' => 'insurancePayment'
                    ],
                    [
                        'component' => 'ipDetail'
                    ]
                ]
            ],
            [
                'component' => 'syncRecruitment',
                'children' => [
                    [
                        'component' => 'recruitmentIndex'
                    ],
                    [
                        'component' => 'candidate'
                    ],
                    [
                        'component' => 'recruitmentDetail'
                    ],
                    [
                        'component' => 'interviewCalendar'
                    ]
                ]
            ]
        ]);
    }
}
