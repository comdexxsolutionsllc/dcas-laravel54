<?php

namespace Modules\Internal\Entities;

use App\BaseModel;
//use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel {

    protected $fillable = [ 'name' ];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
