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

Route::get('fournisseurs','FournisseursController@index');
Route::get('fournisseurs/create','FournisseursController@create');
Route::post('fournisseurs','FournisseursController@store');
Route::get('fournisseurs/edit/{fournisseur}','FournisseursController@edit');
Route::put('fournisseurs/{fournisseur}','FournisseursController@update');
Route::post('fournisseurs/destroy/{fournisseur}','FournisseursController@destroy');

Route::get('achats','AchatsController@index');
Route::get('achats/create','AchatsController@create');
Route::post('achats','AchatsController@store');
Route::get('achats/edit/{achat}','AchatsController@edit');
Route::put('achats/{achat}','AchatsController@update');
Route::post('achats/destroy/{achat}','AchatsController@destroy');
