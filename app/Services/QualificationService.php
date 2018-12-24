<?php

namespace App\Services;

use DB;
use Exception;

class QualificationService
{
    public function getAll()
    {
        return DB::table('qualifications')->get();
    }
}