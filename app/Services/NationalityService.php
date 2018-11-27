<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Nationality;

class NationalityService
{
    public function getAll()
    {
        return Nationality::all();
    }
}