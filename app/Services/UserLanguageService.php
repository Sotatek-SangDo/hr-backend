<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\UserLanguages;
use Carbon\Carbon;
use App\Services\BaseService as Base;

class UserLanguageService extends Base
{
    public function getAll()
    {
        $langs = UserLanguages::with(['employee'])
                ->select('languages_emp.*', 'employees.name as name')
                ->join('employees', 'languages_emp.emp_id', '=', 'employees.id')
                ->orderBy('name', 'DESC')
                ->get();
        return $langs;
            
    }

    public function getELanguage($request)
    {
        return UserLanguages::where('emp_id', $request['id'])->get();
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

    public function update($request)
    {
        $userLanguage = UserLanguages::findOrFail($request['id']);
        $userLanguage->lang_id = $request['lang_id'];
        $userLanguage->emp_id = $request['emp_id'];
        $userLanguage->listen = $request['listen'];
        $userLanguage->speak = $request['speak'];
        $userLanguage->read = $request['read'];
        $userLanguage->write = $request['write'];
        $userLanguage->save();
        return $userLanguage;
    }

    public function destroy($request)
    {
        $userLanguage = UserLanguages::findOrFail($request['id']);
        return $userLanguage->delete();
    }
}