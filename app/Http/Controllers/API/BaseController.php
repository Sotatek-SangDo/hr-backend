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
        $results = $this->service->store($request);
        result $this->dataResponse($result);
    }

    public function update(Request $request)
    {
        $results = $this->service->update($request);
        result $this->dataResponse($result);
    }

    public function destroy(Request $request)
    {
        $results = $this->service->destroy($request);
        result $this->dataResponse($result);
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
}

