<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/Admin/users','Admin/UsersController');

<<<<<<< HEAD
Route::get('caissiers','CaissiersController@index');
Route::get('caissiers/create','CaissiersController@create');
Route::post('caissiers','CaissiersController@store');
Route::get('caissiers/edit/{caissier}','CaissiersController@edit');
Route::put('caissiers/{caissier}','CaissiersController@update');
Route::post('caissiers/destroy/{caissier}','CaissiersController@destroy');
=======

Route::get('clients','ClientsController@index');
Route::get('clients/create','ClientsController@create');
Route::post('clients','ClientsController@store');
Route::get('clients/edit/{client}','ClientsController@edit');
Route::put('clients/{client}','ClientsController@update');
Route::post('clients/destroy/{client}','ClientsController@destroy');
>>>>>>> clients
