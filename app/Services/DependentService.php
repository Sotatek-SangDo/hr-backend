<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Dependent;
use Carbon\Carbon;

class DependentService
{
    public function getAll($empID)
    {
        return Dependent::where('emp_id', $empID)->get();
    }

    public function store($data)
    {
        return Dependent::create([
            'emp_id' => $data["emp_id"],
            'full_name' => $data["full_name"],
            'relationship' => $data["relationship"],
            'birthday' => Carbon::createFromFormat('d-m-Y', $data["birthday"])->toDateString()
        ]);
    }
}