<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DB;

class CompanyController extends Controller 
{

    public function __construct()
    {
        //
    }

    public function getAll()
    {
        $company = DB::table('company')->get();
        return response()->json($company);
    }
}
