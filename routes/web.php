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

Route::get('products/show1/{product}','ProductsController@show1');

// Details achats
Route::get('detailleachats','DetailleachatsController@index');
Route::get('detailleachats/create','DetailleachatsController@create');
Route::post('detailleachats','DetailleachatsController@store');
Route::get('detailleachats/edit/{detailleachat}','DetailleachatsController@edit');
Route::put('detailleachats/{detailleachat}','DetailleachatsController@update');
Route::post('detailleachats/destroy/{detailleachat}','DetailleachatsController@destroy');

// Fournisseurs
Route::get('fournisseurs','FournisseursController@index');
Route::get('fournisseurs/create','FournisseursController@create');
Route::post('fournisseurs','FournisseursController@store');
Route::get('fournisseurs/edit/{fournisseur}','FournisseursController@edit');
Route::put('fournisseurs/{fournisseur}','FournisseursController@update');
Route::post('fournisseurs/destroy/{fournisseur}','FournisseursController@destroy');

// Achats
Route::get('achats','AchatsController@index');
Route::get('achats/create','AchatsController@create');
Route::post('achats','AchatsController@store');
Route::get('achats/edit/{achat}','AchatsController@edit');
Route::put('achats/{achat}','AchatsController@update');
Route::post('achats/destroy/{achat}','AchatsController@destroy');

