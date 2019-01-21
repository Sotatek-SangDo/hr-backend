<?php

namespace App\Imports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidatesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Candidate([
            'name' => $row['name'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'birthday' => $row['birthday'],
            'phonenumber' =>$row['phonenumber'],
            'job_id' => $row['job'],
            'description' => $row['description']
        ]);
    }
}
