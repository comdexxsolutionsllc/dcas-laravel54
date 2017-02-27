<?php
// User impersonate Routes...
Route::get('/users/{id}/impersonate', 'UserController@impersonate');
Route::get('/users/stop', 'UserController@stopImpersonate');

// Other pages...
Route::group([ 'middleware' => 'impersonate' ], function ()
{
    Route::get('/home', 'HomeController@index');
});