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

    public function getAll()
    {
        $certificationUser = $this->certificationUserService->getAll();
        return response()->json($certificationUser);
    }

    public function getECertification(Request $request)
    {
        $certifications = $this->certificationUserService->getECertification($request);
        return response()->json($certifications);
    }

    public function store(Request $request)
    {
        $result = $this->certificationUserService->store($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function update(Request $request)
    {
        $result = $this->certificationUserService->update($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        $result = $this->certificationUserService->destroy($request);
        if ($result)
            return response()->json(['status'=> true, 'mess' => 'Thành công']);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);   
    }
}
