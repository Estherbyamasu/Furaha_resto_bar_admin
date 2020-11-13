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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('categories','CategoriesController@index');
Route::get('categories/create','CategoriesController@create');
Route::post('categories','CategoriesController@store');
Route::post('categorie','CategoriesController@storeprod');
Route::get('categories/edit/{category}','CategoriesController@edit');

Route::get('categories/show/{category}','CategoriesController@show');
Route::put('categories/{category}','CategoriesController@update');

Route::post('categories/destroy/{category}','CategoriesController@destroy');
