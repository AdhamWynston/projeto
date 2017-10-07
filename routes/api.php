<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/user',[
    'uses' => 'UserController@signup'
]);
Route::post('/user/signin',[
    'uses' => 'UserController@signin'
]);
Route::group([
    'as' => 'api.',
    'namespace' => 'Api\\'
], function(){
    Route::post('/access_token', 'AuthController@accessToken');
    Route::group(['middleware' => 'auth:renew'], function (){
        Route::get('/user', function (Request $request){
            return $request->user();
        });
    });
    Route::group(['middleware' => 'auth:api'], function (){
        Route::post('/logout', 'AuthController@logout');
        Route::resource('/clients','ClientsController', ['except' => ['edit','create']]);
        Route::resource('/employees','EmployeesController',['except' => ['edit','create']]);
        Route::resource('/events','EventsController',['except' => ['edit','create']]);
    });
});


