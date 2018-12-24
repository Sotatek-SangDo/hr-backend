<?php

namespace App\Services;

use DB;
use Exception;

class LanguageService
{
    public function getAll()
    {
        return DB::table('languages')->get();
    }
}