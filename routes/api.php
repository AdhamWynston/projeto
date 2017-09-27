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
Route::resource('/post','PostController');
route::get('/test',function (){
    return response()->json([
       'user' => [
           'first_name' => 'Adham',
           'last_name' => 'Wynston'
       ]
    ]);
});
Route::resource('/clients','Api\ClientsController');

