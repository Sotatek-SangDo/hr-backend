<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmergencyContactService;
use App\Models\EmergencyContact;

class EmergencyContactController extends Controller
{
    private $emergencyContactService;

    public function __construct(EmergencyContactService $emergencyContactService)
    {
        $this->emergencyContactService = $emergencyContactService;
    }

    public function getAll()
    {
        $emer = $this->emergencyContactService->getAll();
        return response()->json($emer);
    }

    public function getEEmergencyContact(Request $request)
    {
        $contact = $this->emergencyContactService->getEEmergencyContact($request->all());
        return response()->json($contact);
    }

    public function store(Request $request)
    {
        $result = $this->emergencyContactService->store($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $contact =$this->emergencyContactService->update($request['data']);
        if ($contact)    
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $contact]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        $result = $this->emergencyContactService->destroy($request);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công']);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }
}
