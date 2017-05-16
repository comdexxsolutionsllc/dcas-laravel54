<?php

Route::group(array('prefix' => 'panel', 'module' => 'Panel', 'middleware' => ['web'], 'namespace' => 'App\Modules\Panel\Controllers'), function() {

    Route::resource('panel', 'PanelController');
    
});	
