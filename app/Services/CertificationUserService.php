<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\CertificationUser;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class CertificationUserService extends Base
{
    public function getAll()
    {
        $certifications = CertificationUser::with(['employee'])
                ->select('certification_user.*', 'employees.name as name')
                ->join('employees', 'certification_user.emp_id', '=', 'employees.id')
                ->orderBy('name')
                ->get();
        return $certifications;
    }

    public function getECertification($request)
    {
        return CertificationUser::where('emp_id', $request['id'])->get();
    }

    public function store($data)
    {
        return CertificationUser::create([
            'certification_id' => $data["certification_id"],
            'institute' => $data["institute"],
            'emp_id' => $data["emp_id"],
            'granted_on' => Carbon::createFromFormat('d-m-Y', $data["granted_on"])->toDateString(),
            'valid_to' => Carbon::createFromFormat('d-m-Y', $data["valid_to"])->toDateString()
        ]);
    }

    public function update($request)
    {
        $certificationUser = CertificationUser::findOrFail($request['id']);
        $certificationUser->certification_id = $request['certification_id'];
        $certificationUser->emp_id = $request['emp_id'];
        $certificationUser->institute = $request['institute'];
        $certificationUser->granted_on = Carbon::parse($request['granted_on'])->format('Y-m-d');
        $certificationUser->valid_to = Carbon::parse($request['valid_to'])->format('Y-m-d');
        $certificationUser->save();
        return $certificationUser;
    }

    public function destroy($request)
    {
        $certificationUser = CertificationUser::findOrFail($request->id);
        return $certificationUser->delete();
    }
}
