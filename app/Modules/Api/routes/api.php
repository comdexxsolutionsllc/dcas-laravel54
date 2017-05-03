<?php

Route::group(
    [
        'module' => 'Api',
        'middleware' => ['api'],
        'namespace' => 'App\Modules\Api\Controllers',
        'prefix' => 'api/v1'
    ], function () {

    Route::resource('api', 'ApiController');

//    Route::get('/', 'ApiController@index')->name('api.v1.home');

    Route::get('/test', function () {
        //return Modules\Api\Exceptions\UnsupportedMediaTypeException::send();
        return API::getSomeData(null);
    });

//|                      | POST      | photos                                  | photos.store     | Modules\Api\Http\Controllers\ApiController@store                           |                      |
//|                      | GET|HEAD  | photos                                  | photos.index     | Modules\Api\Http\Controllers\ApiController@index                           |                      |
//|                      | GET|HEAD  | photos/create                           | photos.create    | Modules\Api\Http\Controllers\ApiController@create                          |                      |
//|                      | GET|HEAD  | photos/{photo}                          | photos.show      | Modules\Api\Http\Controllers\ApiController@show                            |                      |
//|                      | PUT|PATCH | photos/{photo}                          | photos.update    | Modules\Api\Http\Controllers\ApiController@update                          |                      |
//|                      | DELETE    | photos/{photo}                          | photos.destroy   | Modules\Api\Http\Controllers\ApiController@destroy                         |                      |
//|                      | GET|HEAD  | photos/{photo}/edit                     | photos.edit      | Modules\Api\Http\Controllers\ApiController@edit                            |                      |

//Route::post('{resource}', ucfirst($resource).'Controller@store');
//Route::get();
//Route::get();
//Route::get();
//Route::put();
//Route::delete();
//Route::get();

});	
