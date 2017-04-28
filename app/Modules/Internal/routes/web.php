<?php

Route::group(array('module' => 'Internal', 'middleware' => ['web'], 'namespace' => 'App\Modules\Internal\Controllers'), function() {

    Route::resource('internal', 'InternalController');
    
});	
