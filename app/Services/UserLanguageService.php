<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\UserLanguages;
use Carbon\Carbon;

class UserLanguageService
{
    public function getAll($empID)
    {
        return UserLanguages::where('emp_id', $empID)
            ->leftjoin('languages', 'languages_emp.lang_id', 'languages.id')
            ->select('languages.title','languages_emp.*')
            ->get();
    }

    public function store($data)
    {
        return UserLanguages::create([
            'lang_id' => $data["lang_id"],
            'emp_id' => $data["emp_id"],
            'listen' => $data["listen"],
            'speak' => $data["speak"],
            'read' => $data["read"],
            'write' => $data["write"]
        ]);
    }
}