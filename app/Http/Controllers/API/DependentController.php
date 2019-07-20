<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DependentService;
use App\Models\Dependent;
use App\Http\Controllers\API\BaseController;

class DependentController extends BaseController
{
    public function __construct(DependentService $dependentService)
    {
        $this->service = $dependentService;
    }

    public function getEDependents(Request $request)
    {
        $dependents = $this->service->getEDependents($request->all());
        return response()->json($dependents);
    }
}
