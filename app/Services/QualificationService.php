<?php

namespace App\Services;

use DB;
use Exception;
use Carbon\Carbon;

class QualificationService
{
    public function getAll()
    {
        return DB::table('qualifications')->get();
    }
}