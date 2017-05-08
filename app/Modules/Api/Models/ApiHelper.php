<?php

namespace App\Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHelper extends Model
{
    protected $fillable = [];

    public function getSomeData($data)
    {
        return response()->json([$data]);
    }
}
