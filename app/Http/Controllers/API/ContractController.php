<?php

namespace App\Http\Controllers\API;

use App\Services\ContractService;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

class ContractController extends BaseController
{
    public function __construct(ContractService $contractService)
    {
        $this->service = $contractService;
    }

    public function contractTypies(Request $request)
    {
        return $this->service->contractTypies($request);
    }

    public function getContract(Request $request)
    {
        $contract = $this->service->getContract($request);
        return response()->json($contract);
    }
}
