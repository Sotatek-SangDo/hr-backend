<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\PayGrade;

class PayGradeService
{
    public function getAll()
    {
        return PayGrade::all();
    }
}