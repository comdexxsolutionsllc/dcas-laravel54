<?php

Route::group(['middleware' => 'web', 'prefix' => 'messenger', 'namespace' => 'Modules\Messenger\Http\Controllers'], function()
{
    Route::get('/', 'MessengerController@index');
});
