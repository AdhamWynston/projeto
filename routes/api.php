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

Route::group(['middleware'=> ['cors','auth:api']], function(){
    Route::get('/user', function (Request $request){
        return $request->user();
    })->middleware('auth:api');
    Route::resource('/post','PostController');
    Route::resource('/clients','Api\ClientsController');
    Route::resource('/employees','Api\EmployeesController');
    Route::resource('/events','Api\EventsController');
});


