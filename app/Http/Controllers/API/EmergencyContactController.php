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

    public function getAll(Request $request)
    {
        $emer = $this->emergencyContactService->getAll($request->emp_id);
        return response()->json($emer);
    }

    public function store(Request $request)
    {
        $result = $this->emergencyContactService->store($request->all());
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        try {
            $emer = EmergencyContact::findOrFail($request['id']);
            $emer->full_name = $request['full_name'];
            $emer->relationship = $request['relationship'];
            $emer->contact_phone = $request['contact_phone'];
            $emer->save();
            
            return response()->json(['status' => true]);
        } catch (Exception $e) {
             return response()->json(['status' => false]);
        }

    }

    public function destroy(Request $request)
    {
        try {
            $emer = EmergencyContact::findOrFail($request->id);
            $emer->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
