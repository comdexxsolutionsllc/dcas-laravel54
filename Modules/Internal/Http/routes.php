<?php

Route::group(['middleware' => 'web', 'prefix' => 'internal', 'namespace' => 'Modules\Internal\Http\Controllers'], function()
{
    Route::get('/', 'InternalController@index');
});
