<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Job;

class JobService
{
    public function getAll()
    {
        return Job::all();
    }
}