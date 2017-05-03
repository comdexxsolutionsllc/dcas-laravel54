<?php

namespace Modules\Api\Helpers;

use \bandwidthThrottle\tokenBucket\TokenBucketException;
use \bandwidthThrottle\tokenBucket\TokenBucket;
use \bandwidthThrottle\tokenBucket\Rate;
use \bandwidthThrottle\tokenBucket\storage\FileStorage;

class ApiHelper
{
    public static function callApi($consumer, $params)
    {

        //Enforce the quota, wait until ready.
        $consumer->consume(1);

        //Call the api
        return API::getSomeData($params);
    }
}
