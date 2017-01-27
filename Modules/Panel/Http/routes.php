<?php

Route::group(['middleware' => 'web', 'prefix' => 'panel', 'namespace' => 'Modules\Panel\Http\Controllers'], function()
{
    Route::get('/', 'PanelController@index');
});
