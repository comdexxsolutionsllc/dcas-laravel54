<?php

Route::group(['middleware' => 'web', 'prefix' => 'chat', 'namespace' => 'Modules\Chat\Http\Controllers'], function()
{
    Route::get('/', 'ChatController@index');
});
