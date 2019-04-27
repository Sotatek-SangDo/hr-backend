<?php

namespace App\Services;

use App\Consts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaseService
{
    private $exceptKey = 'except';
    private $dateFieldKey = 'dateFields';
    public $model;

    public function parseRequestParams($request)
    {
        return [
            'sortType' => trim(substr($request['sort'], 0, 1)) === Consts::PLUS ? 'DESC' : 'ASC',
            'sort' => substr($request['sort'], 1),
            'limited' => $request['limit'] ? $request['limit'] : Consts::LIMIT,
            'title' => isset($request['title']) ? $request['title'] : '',
            'keySearch' => isset($request['keySearch']) ? $request['keySearch'] : '',
            'keySearchSalary' => isset($request['keySearchSalary']) ? $request['keySearchSalary'] : '',
            'keySearchAllowance' => isset($request['keySearchAllowance']) ? $request['keySearchAllowance'] : '',
            'keySearchBusiness' => isset($request['keySearchBusiness']) ? $request['keySearchBusiness'] : ''
        ];
    }

    public function basePaginate($request, $query = '')
    {
        $params = $this->parseRequestParams($request);
        $baseQuery = $query;
        if (!$query) {
            $baseQuery = $this->model;
        }
        if ($params['title']) {
            $baseQuery = $baseQuery->orderBy($params['sort'], $params['sortType'])->where('name', 'LIKE', '%' . $params['title'] . '%');
        }
        if ($params['keySearch']) {
            $sortField = "contracts.{$params['sort']}";
            $baseQuery = $baseQuery->orderBy($sortField, $params['sortType'])
                ->leftJoin('employees', 'contracts.employee_id', 'employees.id')
                ->where('employees.name', 'LIKE', '%' . $params['keySearch'] . '%');
        }
        if ($params['keySearchSalary']) {
            $sortField = "salaries.{$params['sort']}";
            $baseQuery = $baseQuery->orderBy($sortField, $params['sortType'])
                ->leftJoin('contracts', 'salaries.id', 'contracts.salary_id')
                ->leftJoin('employees', 'contracts.employee_id', 'employees.id')
                ->where('employees.name', 'LIKE', '%' . $params['keySearchSalary'] . '%');
        }
        if ($params['keySearchAllowance']) {
            $sortField = "allowances.{$params['sort']}";
            $baseQuery = $baseQuery->orderBy($sortField, $params['sortType'])
                ->leftJoin('employees', 'allowances.employee_id', 'employees.id')
                ->where('employees.name', 'LIKE', '%' . $params['keySearchAllowance'] . '%');
        }
        if ($params['keySearchBusiness']) {
            $sortField = "salary_business.{$params['sort']}";
            $baseQuery = $baseQuery->orderBy($sortField, $params['sortType'])
                ->leftJoin('employees', 'salary_business.employee_id', 'employees.id')
                ->where('employees.name', 'LIKE', '%' . $params['keySearchBusiness'] . '%');
        }
        return $baseQuery->paginate($params['limited']);
    }

    public function getID($request)
    {
        return $request['id'];
    }

    public function baseUpdate($request)
    {
        $params = $this->queryParams($request);
        $result = $this->model->where('id', $this->getID($request))->update($params);
        if (!$result) {
            return $result;
        }
        return $this->model->find($this->getID($request));
    }

    public function queryParams($request)
    {
        $except = is_callable([$this, $this->exceptKey]) ? $this->except() : [];
        $dateFields = method_exists($this, $this->dateFieldKey) ? $this->dateFields() : [];
        $params = $this->getParams($request, $except);
        if ($dateFields) {
            collect($dateFields)->each(function($item, $key) use (&$params) {
                $date = '';
                try {
                    $date = Carbon::createFromFormat('Y-m-d', $params[$item])->toDateString();
                } catch(\Exception $e) {
                    try {
                        $date = Carbon::createFromFormat('Y-m-d H:i', $params[$item])->toDateTimeString();
                    } catch(\Exception $e) {
                        $date = Carbon::parse($params[$item])->format('Y-m-d')->toDateString();
                    }
                }
                $params[$item] = $date;
            });
        }
        if ($except && isset($except['value'])) {
            collect($except['value'])->each(function($item, $key) use (&$params) {
                $params[$key] = $item;
            });
        }
        return $params;
    }

    public function baseStore($request)
    {
        $params = $this->queryParams($request);
        return $this->model->create($params);
    }

    private function getFillable()
    {
        return $this->model->getFillable();
    }

    private function getParams($request, $except = [])
    {
        $fillable = $this->getFillable();
        if ($except && isset($except['key'])) {
            collect($except['key'])->each(function($item, $key) use (&$fillable) {
                unset($fillable[$item]);
            });
        }
        return $request->only($fillable);
    }

    public function hasFile($request)
    {
        return is_file($request->file);
    }

    public function store($request)
    {
        return $this->baseStore($request);
    }

    public function update($request)
    {
        return $this->baseUpdate($request);
    }

    public function destroy($request)
    {
        $removeItem = $this->model->findOrFail($this->getID($request));
        return $removeItem->delete();
    }

    public function getAll($request)
    {
        return $this->basePaginate($request);
    }

    public function getList()
    {
        return $this->model->all();
    }
}
