<?php

Route::group(array('module' => 'Messenger', 'middleware' => ['web'], 'namespace' => 'App\Modules\Messenger\Controllers'), function() {

    Route::resource('messenger', 'MessengerController');
    
});


//<?php
//
//Route::group([
//    'middleware' => 'web',
//    'prefix'     => 'messenger/messages',
//    'namespace'  => 'Modules\Messenger\Http\Controllers'
//], function ()
//{
//    Route::get('/', 'MessengerController@index');
//
//    Route::get('/', [ 'as' => 'messages', 'uses' => 'MessagesController@index' ]);
//    Route::get('create', [ 'as' => 'messages.create', 'uses' => 'MessagesController@create' ]);
//    Route::post('/', [ 'as' => 'messages.store', 'uses' => 'MessagesController@store' ]);
//    Route::get('{id}', [ 'as' => 'messages.show', 'uses' => 'MessagesController@show' ]);
//    Route::put('{id}', [ 'as' => 'messages.update', 'uses' => 'MessagesController@update' ]);
//
//    Route::get('{id}/click', 'MessagesController@clickPost');
//});
