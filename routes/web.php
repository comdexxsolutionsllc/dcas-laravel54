<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes... // null
Route::get('register', function ()
{
    abort(403, 'Unauthorized action.');
})->name('register');

Route::post('register', function ()
{
    abort(403, 'Unauthorized action.');
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// User impersonate Routes...
Route::get('/users/{id}/impersonate', 'UserController@impersonate');
Route::get('/users/stop', 'UserController@stopImpersonate');

// Other pages...
Route::group(['middleware' => 'impersonate'], function()
{
    Route::get('/home', 'HomeController@index');
});
