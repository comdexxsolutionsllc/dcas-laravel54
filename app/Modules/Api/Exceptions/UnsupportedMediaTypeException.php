<?php
namespace Modules\Api\Exceptions;

class UnsupportedMediaTypeException extends \Exception {

    static public function send()
    {
        return \Response::json([
            'status'      => 415,
            'reason'      => 'Unsupported Media Type',
            'description' => 'Media type parameters are not allowed for this request'
        ], 415, [
            'API_ERROR_VERSION'     => 'beta',
            'API_ERROR_STATUS'      => 415,
            'API_ERROR_REASON'      => 'Unsupported Media Type',
            'API_ERROR_DESCRIPTION' => 'Media type parameters are not allowed for this request'
        ]);
    }
}