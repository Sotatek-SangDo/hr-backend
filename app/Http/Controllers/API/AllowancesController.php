<?php

namespace App\Http\Controllers\API;

use App\Services\AllowancesService;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

class AllowancesController extends BaseController
{
    public function __construct(AllowancesService $allowancesService)
    {
        $this->service = $allowancesService;
    }

    public function getAllowances(Request $request)
    {
        $allowances = $this->service->getAllowances($request);
        return response()->json($allowances);
    }
}
