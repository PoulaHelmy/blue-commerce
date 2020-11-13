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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User Routes
Route::resource('/users', 'UsersController')->except('show');
Route::get('/profile', 'ProfileController@readprofile')->name('profile');
Route::get('/profile/{user:email}/edit', 'ProfileController@edit')->name('edit.profile');
Route::put('/profile/{user}', 'ProfileController@update')->name('update.profile');
Route::get('/users/trashed', 'UsersController@trashed')->name('users.trashed');
Route::put('/users/{id}/restore', 'UsersController@restore')->name('users.restore');
Route::delete('/users/{id}/force-deleted', 'UsersController@forceDelete')->name('users.forceDelete');


Route::resource('/brands', 'BrandsController')->except('show');
Route::resource('/categories', 'CategoriesController')->except('show');
Route::resource('/products', 'ProductsController')->except('show');
