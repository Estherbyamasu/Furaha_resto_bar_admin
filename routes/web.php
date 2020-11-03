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

Route::get('caissiers','CaissiersController@index');
Route::get('caissiers/create','CaissiersController@create');
Route::post('caissiers','CaissiersController@store');
Route::get('caissiers/edit/{caissier}','CaissiersController@edit');
Route::put('caissiers/{caissier}','CaissiersController@update');
Route::post('caissiers/destroy/{caissier}','CaissiersController@destroy');