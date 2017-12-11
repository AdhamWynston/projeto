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
            Route::get('/user/current', function (Request $request){
                return $request->user();
            });
            Route::put('/user/profile', 'UsersController@updateProfile');
        });
    Route::resource('/employees','EmployeesController',['except' => ['edit','create']]);
    Route::resource('/clients','ClientsController', ['except' => ['edit','create']]);
    Route::resource('/users', 'UsersController',['except' => ['edit','create']]);
    Route::resource('/events','EventsController',['except' => ['edit','create']]);

    Route::get('/clients/{email}/{id}','ClientsController@checkEmail');
    Route::get('/employees/{email}/{id}','EmployeesController@checkEmail');
    Route::get('/users/{email}/{id}','UsersController@checkEmail');

    Route::get('/clients/document/{document}/{id}','ClientsController@checkDocument');
    Route::get('/employees/document/{document}/{id}','EmployeesController@checkDocument');
    Route::post('/employee/exists','EmployeesController@checkName');
    Route::post('/event/exists','EventsController@checkName');
    Route::post('/client/exists','ClientsController@checkName');

    Route::get('/client/{id}/events', 'ClientsController@clientEvents');
    Route::post('/events/check','EventsController@checkDate');
    Route::get('/manage/check/events/{id}', 'ManageEventsController@check');
    Route::get('/manage/employee/list/{id}', 'ManageEventsController@employeeList');
    Route::get('/manage/employee/checkfrequency/{id}', 'ManageEventsController@checkListEmployeeFrequency');
    Route::resource('/manage/events', 'ManageEventsController');
    Route::get('/manage/employee/checkin/list/events/{id}', 'ManageEventsController@employeeCheckedinList');
    Route::get('/manage/employee/checkout/list/events/{id}', 'ManageEventsController@employeeCheckedoutList');

    Route::get('/token/confirmed/{token}','UsersController@confirmation');
    Route::post('/token/{id}/password', 'UsersController@updatePassword');
    Route::post('/token/recovery', 'UsersController@recovery');
    Route::get('/reports/event/{id}', 'EventsReportsController@individual');
    Route::get('/reports/client/{id}', 'ClientsReportsController@individual');
    Route::get('/reports/employee/{id}', 'EmployeesReportsController@individual');
    Route::get('/reports/teste/{id}', 'EventsReportsController@teste');
    Route::get('/reports/individual/employee', 'EmployeesReportsController@reportIndividual');
    Route::get('/reports/all/employee', 'EmployeesReportsController@reportAll');
    Route::get('/reports/individual/client', 'ClientsReportsController@reportIndividual');
    Route::get('/reports/all/client', 'ClientsReportsController@reportAll');
    Route::get('/reports/individual/event', 'EventsReportsController@reportIndividual');
    Route::get('/reports/all/user', 'UsersReportsController@reportAll');
    Route::get('/reports/all/event', 'EventsReportsController@reportAll');
//    Route::post('/reports/employee', 'EmployeesReportsController@report');
});


