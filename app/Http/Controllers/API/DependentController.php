<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DependentService;
use App\Models\Dependent;

class DependentController extends Controller
{
    private $dependentService;

    public function __construct(DependentService $dependentService)
    {
        $this->dependentService = $dependentService;
    }

    public function getAll(Request $request)
    {
        $educations = $this->dependentService->getAll($request->emp_id);
        return response()->json($educations);
    }

    public function getEDependents(Request $request)
    {
        $dependents = $this->dependentService->getEDependents($request->all());
        return response()->json($dependents);
    }

    public function store(Request $request)
    {
        $result = $this->dependentService->store($request['data']);
        if ($result)
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $result]);
        return response()->json(['status' => false, 'mess' => 'Lỗi Server']);
    }

    public function update(Request $request)
    {
        $dependent = $this->dependentService->update($request['data']);
        if ($dependent)    
            return response()->json(['status' => true, 'mess' => 'Thành công', 'data' => $dependent]);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }

    public function destroy(Request $request)
    {
        $result = $this->dependentService->destroy($request->all());
            return response()->json(['status' => true, 'mess' => 'Thành công']);
        return response()->json(['status' => false, 'mess' => 'Lỗi server']);
    }
}
