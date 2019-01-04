<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\InsurancePayment;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class InsurancePaymentService extends Base
{
    public function getAll()
    {
        return InsurancePayment::all();
    }

    public function store($request)
    {
        return InsurancePayment::create([
            'time' => $request['time'],
            'title' => $request['title'],
        ]);
    }

    public function update($request)
    {
        $insurance = InsurancePayment::findOrFail($request['id']);
        $insurance->time = $request['time'];
        $insurance->title = $request['title'];
        $insurance->save();
        return $insurance;
    }
}
