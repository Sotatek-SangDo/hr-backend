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

    public function store(Request $request)
    {
        $result = $this->dependentService->store($request->all());
        if ($result)
            return response()->json(['status' => true]);
        return response()->json(['status' => false]);
    }

    public function update(Request $request)
    {
        try {
            $dependent = Dependent::findOrFail($request['id']);
            $dependent->full_name = $request['full_name'];
            $dependent->relationship = $request['relationship'];
            $dependent->birthday = $request['birthday'];
            $dependent->save();
            
            return response()->json(['status' => true]);
        } catch (Exception $e) {
             return response()->json(['status' => false]);
        }

    }

    public function destroy(Request $request)
    {
        try {
            $dependent = Dependent::findOrFail($request->id);
            $dependent->delete();
            return response()->json(['status' => true]);
        } catch (Exception $e) {
            return response()->json(['status' => false]);
        }
        
    }
}
