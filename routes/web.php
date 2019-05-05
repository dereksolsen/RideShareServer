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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/admin', 'AdminController@index')->name('home');

Auth::routes();

Route::get('/drivers', 'DriversController@index')->name('users');
    Route::get('/drivers/register', 'DriversController@create')->name('users');
    Route::post('/drivers', 'DriversController@store')->name('users');
    Route::get('/drivers/{email}', 'DriversController@view')->name('users');
    Route::delete('/drivers/{email}', 'DriversController@destroy')->name('users');
    Route::get('/drivers/{email}/edit', 'DriversController@edit')->name('users');
    
Route::get('/clients', 'ClientsController@index')->name('users');
    Route::get('/clients/register', 'ClientsController@create')->name('users');
    Route::post('/clients', 'ClientsController@store')->name('users');
    Route::get('/clients/{email}', 'ClientsController@view')->name('users');
    Route::patch('/clients/{email}', 'ClientsController@update')->name('users');
    Route::delete('/clients/{email}', 'ClientsController@destroy')->name('users');
    Route::get('/clients/{email}/edit', 'ClientsController@edit')->name('users');
    
Route::get('/requests', 'ServiceableRequestsController@index')->name('requests');  
    Route::get('/requests/new', 'ServiceableRequestsController@create')->name('requestsNew');
    Route::post('/requests', 'ServiceableRequestsController@store')->name('requests');
    Route::get('/requests/history', 'ServiceableRequestsController@history')->name("requests");
    Route::delete('/requests/{id}', 'ServiceableRequestsController@destroy')->name('requests');