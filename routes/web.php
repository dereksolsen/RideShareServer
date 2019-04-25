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
    return view('welcome');
});

Route::get('/admin', 'AdminController@index')->name('home');

Auth::routes();

Route::get('/drivers', 'DriversController@index')->name('users');
    Route::get('/drivers/register', 'DriversController@create')->name('users');
    Route::post('/drivers', 'DriversController@store')->name('users');
    Route::get('/drivers/{name}', 'DriversController@view')->name('users');
Route::get('/clients', 'ClientsController@index')->name('users');
    Route::get('/clients/register', 'ClientsController@create')->name('users');
    Route::post('/clients', 'ClientsController@store')->name('users');
    
Route::get('/requests', 'ServiceableRequestsController@index')->name('requests');  
    Route::get('/requests/new', 'ServiceableRequestsController@create')->name('requests');