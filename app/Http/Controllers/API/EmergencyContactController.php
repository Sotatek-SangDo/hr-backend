<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmergencyContactService;
use App\Models\EmergencyContact;
use App\Http\Controllers\API\BaseController;

class EmergencyContactController extends BaseController
{
    public function __construct(EmergencyContactService $emergencyContactService)
    {
        $this->service = $emergencyContactService;
    }

    public function getEEmergencyContact(Request $request)
    {
        $contact = $this->service->getEEmergencyContact($request->all());
        return response()->json($contact);
    }
}
