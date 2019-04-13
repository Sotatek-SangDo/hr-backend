<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    protected $table = 'contract_typies';

    protected $hidden = ['created_at', 'updated_at'];
}
