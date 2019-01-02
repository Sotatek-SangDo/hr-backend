<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\EmergencyContact;
use App\Services\BaseService as Base;

class EmergencyContactService extends Base
{
    public function getAll()
    {
        $contacts = EmergencyContact::with(['employee'])
                ->select('emergency_contacts.*', 'employees.name as name')
                ->join('employees', 'emergency_contacts.emp_id', '=', 'employees.id')
                ->orderBy('name', 'DESC')
                ->get();
        return $contacts;
    }

    public function getEEmergencyContact($request)
    {
        return EmergencyContact::where('emp_id', $request['id'])->get();
    }

    public function store($data)
    {
        return EmergencyContact::create([
            'emp_id' => $data["emp_id"],
            'full_name' => $data["full_name"],
            'relationship' => $data["relationship"],
            'contact_phone' => $data["contact_phone"]
        ]);
    }

    public function update($request)
    {
        $contact = EmergencyContact::findOrFail($request['id']);
        $contact->full_name = $request['full_name'];
        $contact->relationship = $request['relationship'];
        $contact->contact_phone = $request['contact_phone'];
        $contact->save();
        return $contact;
    }

    public function destroy($request)
    {
        $contact = EmergencyContact::findOrFail($request['id']);
        return $contact->delete();
    }
}