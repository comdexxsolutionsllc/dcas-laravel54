<?php
namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response as IlluminateResponse;

/**
 * Class DCASDomainErrorHelper
 */
class DCASDomainErrorHelper {

    /**
     * Flag Unauthorized Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    static public function unauthorizedException()
    {
        return response()->json([
            'error_code'        => IlluminateResponse::HTTP_UNAUTHORIZED,
            'error_description' => IlluminateResponse::$statusTexts['401']
        ], IlluminateResponse::HTTP_UNAUTHORIZED);
    }
}