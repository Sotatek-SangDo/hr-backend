<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
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
