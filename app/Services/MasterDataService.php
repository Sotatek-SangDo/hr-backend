<?php

namespace App\Services;

use DB;
use Exception;
use Carbon\Carbon;
use Cache;
use App\Consts;
use App\Models\EmployeeStatus;
use App\Models\Department;
use App\Models\Job;
use App\Models\PayGrade;
use App\Models\Skill;
use App\Models\Nationality;

class MasterDataService
{
    public function getData()
    {
        $masterData = Cache::has(Consts::MASTER_DATA)
        ? Cache::get(Consts::MASTER_DATA)
        : $this->getMasterData();
        return $masterData;
    }

    private function getMasterData()
    {
        return [
            'nationality' => Nationality::all(),
            'employeeStatus' => EmployeeStatus::all(),
            'department' => Department::all(),
            'job' => Job::all(),
            'paygrade' => PayGrade::all(),
            'skill' => Skill::all(),
            'qualification' => DB::table('qualifications')->get(),
            'certification' => DB::table('certifications')->get(),
            'language' => DB::table('languages')->get(),
            'contractType' => DB::table('contract_typies')->get(),
            'salaryInsurance' => DB::table('salary_insurances')->get()
        ];
    }
}
