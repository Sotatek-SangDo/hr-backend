<?php

namespace App\Imports;

use App\Models\Interview;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InterviewImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Interview([
            'candidate_id' => $row['candidate_id'],
            'interviewer' => $row['interviewer'],
            'started_at' => $row['started_at'],
            'address' => $row['address']
        ]);
    }
}
