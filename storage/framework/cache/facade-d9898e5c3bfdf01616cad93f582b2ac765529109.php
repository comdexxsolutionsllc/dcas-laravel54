<?php

namespace Facades\Modules\Api\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Modules\Api\Facades\ApiHelper
 */
class ApiHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Modules\Api\Facades\ApiHelper';
    }
}
