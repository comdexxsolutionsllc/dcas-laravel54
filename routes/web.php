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

require_once('web_authentication.php');
require_once('web_impersonate.php');
require_once('web_cashier.php');


Route::group(['middleware' => 'timeout'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->middleware('restrict.ip.main');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/sitemap.xml', 'PagesController@sitemap');

// Datatable routes...
    Route::get('datatables', ['uses' => 'HomeController@getIndex', 'as' => 'datatables']);
    Route::post('datatables/data', ['uses' => 'HomeController@anyData', 'as' => 'datatables.data']);

// Role routes...
    Route::resource('role', 'RoleController');
});


// TODO:  Remove this for production
if (App::environment() != 'production') {
    Route::get('logoutnow', function () {
        Auth::logout();

        return redirect()->route('login');
    });
}