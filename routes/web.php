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






Route::get('clients','ClientsController@index');
Route::get('clients/create','ClientsController@create');
Route::post('clients','ClientsController@store');
Route::get('clients/edit/{client}','ClientsController@edit');
Route::put('clients/{client}','ClientsController@update');
Route::post('clients/destroy/{client}','ClientsController@destroy');

Route::get('serveurs','ServeursController@index');
Route::get('serveurs/create','ServeursController@create');
Route::post('serveurs','ServeursController@store');
Route::get('serveurs/edit/{serveur}','ServeursController@edit');
Route::put('serveurs/{serveur}','ServeursController@update');
Route::post('serveurs/destroy/{serveur}','ServeursController@destroy');


Route::get('factures','FacturesController@index');
Route::get('factures/create','FacturesController@create');
Route::post('factures','FacturesController@store');
Route::get('factures/edit/{facture}','FacturesController@edit');
Route::put('factures/{facture}','FacturesController@update');
Route::post('factures/destroy/{facture}','FacturesController@destroy');
Route::post('search','FacturesController@search');


Route::get('factures/show','FacturesController@show');
Route::get('factures/apercue/{facture}','FacturesController@apercue');



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
});



Route::get('categories','CategoriesController@index');
Route::get('categories/create','CategoriesController@create');
Route::post('categories','CategoriesController@store');
Route::post('categorie','CategoriesController@storeprod');
Route::get('categories/edit/{category}','CategoriesController@edit');

Route::get('categories/show/{category}','CategoriesController@show');
Route::put('categories/{category}','CategoriesController@update');

Route::post('categories/destroy/{category}','CategoriesController@destroy');


Route::get('products','ProductsController@index');
Route::get('products/create','ProductsController@create');
Route::post('products','ProductsController@store');
Route::get('products/edit/{product}','ProductsController@edit');
Route::put('products/{product}','ProductsController@update');
Route::post('products/destroy/{product}','ProductsController@destroy');
Route::post('search','ProductsController@search');
Route::get('products/show/{product}','ProductsController@show');
Route::get('products/show1/{product}','ProductsController@show1
');




Route::get('detaillefactures','DetaillefacturesController@index');
Route::get('detaillefactures/create','DetaillefacturesController@create');
Route::post('detaillefactures','DetaillefacturesController@store');
Route::get('detaillefactures/edit/{detaillefacture}','DetaillefacturesController@edit');
Route::put('detaillefactures/{detaillefacture}','DetaillefacturesController@update');
Route::post('detaillefactures/destroy/{detaillefacture}','DetaillefacturesController@destroy');


