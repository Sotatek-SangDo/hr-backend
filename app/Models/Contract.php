<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';

    protected $fillable = ['candidate_id', 'contract_code', 'start_date', 'end_date', 'contract_type_id', 'salary_basic', 'salary_insurrance', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function contractType()
    {
        return $this->hasOne(ContractType::class, 'contract_type_id', 'id');
    }
}
