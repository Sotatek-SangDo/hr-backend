<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function getAll(Request $request)
    {
        $result = $this->service->getAll($request);
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $result = $this->service->store($request);
        return $this->dataResponse($result);
    }

    public function update(Request $request)
    {
        $result = $this->service->update($request);
        return $this->dataResponse($result);
    }

    public function destroy(Request $request)
    {
        $result = $this->service->destroy($request);
        return $this->dataResponse($result);
    }

    public function dataResponse($result)
    {
        if ($result)
            return response()->json([
                'status' => true,
                'mess' => 'Thành công',
                'data' => $result
            ]);
        return response()->json([
            'status' => false,
            'mess' => 'Lỗi server'
        ]);
    }

    public function getList()
    {
        return $this->service->getList();
    }
}

