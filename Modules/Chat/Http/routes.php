<?php

Route::group([
    'prefix'     => 'chat',
    'middleware' => 'web',
    'namespace'  => 'Modules\Chat\Http\Controllers'
], function ()
{
    Route::get('/', 'ChatController@index');
    Route::get('messages', 'ChatController@fetchMessages');
    Route::post('messages', 'ChatController@sendMessage');
    Route::get('users', 'ChatController@fetchUsers');
    Route::post('users', 'ChatController@setUsers');
    Route::delete('users', 'ChatController@deleteUsers');
});
