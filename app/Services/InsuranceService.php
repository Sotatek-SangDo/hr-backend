<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\Insurance;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class InsuranceService extends Base
{
    public function getAll()
    {
        return Insurance::with(['employee'])
            ->select('employees.name as name', 'insurances.*', 'jobs.title as title')
            ->leftjoin('employees', 'employees.id', '=', 'insurances.emp_id')
            ->leftjoin('jobs', 'employees.job_id', '=', 'jobs.id')
            ->get();
    }

    public function store($request)
    {
        return Insurance::create([
            'emp_id' => $request['emp_id'],
            'num_social_security' => $request['num_social_security'],
            'num_health_insurance' => $request['num_health_insurance'],
            'place_registration_medical' => $request['place_registration_medical'],
            'salary_paid' => $request['salary_paid'],
            'started_at' => Carbon::createFromFormat('d-m-Y', $request["started_at"])->toDateString(),
            'status' => $request['status']
        ]);
    }

    public function update($request)
    {
        $insurance = Insurance::findOrFail($request['id']);
        $insurance->emp_id = $request['emp_id'];
        $insurance->num_social_security = $request['num_social_security'];
        $insurance->num_health_insurance = $request['num_health_insurance'];
        $insurance->place_registration_medical = $request['place_registration_medical'];
        $insurance->salary_paid = $request['salary_paid'];
        $insurance->started_at = Carbon::parse($request['started_at'])->format('Y-m-d');
        $insurance->status = $request['status'];
        $insurance->save();
        return $insurance;
    }

    public function destroy($request)
    {
        $insurance = Insurance::findOrFail($request['id']);
        return $insurance->delete();
    }
}
