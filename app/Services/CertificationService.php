<?php

namespace App\Services;

use DB;
use Exception;
use Carbon\Carbon;

class CertificationService
{
    public function getAll()
    {
        return DB::table('certifications')->get();
    }
}