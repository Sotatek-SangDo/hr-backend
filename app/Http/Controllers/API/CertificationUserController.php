<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CertificationUserService;
use App\Models\CertificationUser;
use Carbon\Carbon;

class CertificationUserController extends Controller
{
    private $certificationUserService;

    public function __construct(CertificationUserService $certificationUserService)
    {
        $this->certificationUserService = $certificationUserService;
    }

    public function getAll(Request $request)
    {
        $certificationUser = $this->certificationUserService->getAll($request->emp_id);
        return response()->json($certificationUser);
    }

    public function store(Request $request)
    {
        $result = $this->certificationUserService->store($request->all());
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        try {
            $certificationUser = CertificationUser::findOrFail($request['id']);
            $certificationUser->certification_id = $request['certification_id'];
            $certificationUser->emp_id = $request['emp_id'];
            $certificationUser->institute = $request['institute'];
            $certificationUser->granted_on = Carbon::createFromFormat('d-m-Y', $request['granted_on'])->toDateString();
            $certificationUser->valid_to = Carbon::createFromFormat('d-m-Y', $request['valid_to'])->toDateString();
            $certificationUser->save();
            
            return response()->json(['status' => true]);
        } catch (Exception $e) {
             return response()->json(['status' => false]);
        }

    }

    public function destroy(Request $request)
    {
        try {
            $certificationUser = CertificationUser::findOrFail($request->id);
            $certificationUser->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
