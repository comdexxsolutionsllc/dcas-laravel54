<?php

namespace Modules\Api\Facades;


use Illuminate\Support\Facades\Facade;

class ApiHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'apihelper';
    }

}