<?php

Route::group(array('prefix' => 'api', 'module' => 'Api', 'middleware' => ['web'], 'namespace' => 'App\Modules\Api\Controllers'), function() {

    Route::resource('api', 'ApiController');
    
});	
