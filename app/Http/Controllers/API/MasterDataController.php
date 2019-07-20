<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Services\MasterDataService;

class MasterDataController
{
    public function __construct(MasterDataService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $masterData = $this->service->getData();
        return response()->json($masterData);
    }
}
