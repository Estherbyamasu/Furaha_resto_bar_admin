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

Route::get('serveurs','ServeursController@index');
Route::get('serveurs/create','ServeursController@create');
Route::post('serveurs','ServeursController@store');
Route::get('serveurs/edit/{serveur}','ServeursController@edit');
Route::put('serveurs/{serveur}','ServeursController@update');
Route::post('serveurs/destroy/{serveur}','ServeursController@destroy');