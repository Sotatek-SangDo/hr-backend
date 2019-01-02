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

    public function getEDependents($request)
    {
        return Dependent::where('emp_id', $request['id'])->get();
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

    public function update($request)
    {
        $dependent = Dependent::findOrFail($request['id']);
        $dependent->full_name = $request['full_name'];
        $dependent->relationship = $request['relationship'];
        $dependent->birthday = Carbon::parse($request['birthday'])->format('Y-m-d');
        $dependent->save();
        return $dependent;
    }

    public function destroy($request)
    {
        $dependent = Dependent::findOrFail($request['id']);
        return $dependent->delete();
    }
}