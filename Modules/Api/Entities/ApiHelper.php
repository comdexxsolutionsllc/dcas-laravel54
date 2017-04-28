<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;

class ApiHelper extends Model
{
    protected $fillable = [];

    public function getSomeData($data)
    {
        return 3;
    }
}
