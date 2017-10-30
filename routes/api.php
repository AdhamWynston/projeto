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
        Route::resource('/employees','EmployeesController',['except' => ['edit','create']]);
        Route::resource('/clients','ClientsController', ['except' => ['edit','create']]);
        Route::get('/unique/employees', 'EmployeesController@unique');
    });
    Route::get('/unique/clients', 'ClientsController@unique');
    Route::resource('/clients','ClientsController', ['except' => ['edit','create']]);
    Route::resource('/users', 'UsersController',['except' => ['edit','create']]);
    Route::get('/clients/{email}/{id}','ClientsController@checkEmail');
    Route::get('/users/{email}/{id}','UsersController@checkEmail');
    Route::get('/employees/{email}/{id}','EmployeesController@checkEmail');
    Route::resource('/events','EventsController',['except' => ['edit','create']]);
    Route::get('/client/{id}/events', 'ClientsController@clientEvents');
    Route::post('/events/check','EventsController@checkDate');
});


