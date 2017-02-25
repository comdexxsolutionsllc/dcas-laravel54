<?php

Route::group([
    'domain'     => 'chat.sarahrenner.work',
    'middleware' => 'web',
    'namespace'  => 'Modules\Chat\Http\Controllers'
], function ()
{
    Route::get('/', 'ChatController@index');
    Route::get('messages', 'ChatController@fetchMessages');
    Route::post('messages', 'ChatController@sendMessage');
});
