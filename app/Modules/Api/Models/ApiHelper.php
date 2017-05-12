<?php

namespace App\Modules\Api\Models;

//use Illuminate\Database\Eloquent\Model;


use App\BaseModel;

class ApiHelper extends BaseModel
{
    protected $fillable = [];

    public function getSomeData($data)
    {
        return response()->json(['data' => $data]);
    }
}
