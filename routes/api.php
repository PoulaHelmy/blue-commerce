<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

/* For Password reset operations*/
Route::group(['middleware' => 'api', 'prefix' => 'password'], function () {
    Route::post('create', 'Api\PasswordResetController@create');
    Route::get('find/{token}', 'Api\PasswordResetController@find');
    Route::post('reset', 'Api\PasswordResetController@reset');
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\Passport@login');
    Route::post('signup', 'Api\Passport@signup');
    Route::get('signup/activate/{token}', 'Api\Passport@signupActivate');
    Route::group(['middleware' => 'auth:api'], function () {

        /*************************** Passport USer Routes **************************/
        Route::get('user', 'Api\Passport@details');
        Route::post('update/password', 'Api\Passport@updatePassword');
        Route::get('logout', 'Api\Passport@logout');
        Route::post('update', 'Api\Passport@update');
        Route::get('userdata/{id}', 'Api\Passport@UserData');
        /*********************************** -- ***************************************/
    });
});
Route::get('products/all', 'Api\ProductsController@index');
Route::get('brands/all', 'Api\BrandsController@index');
Route::get('category/all', 'Api\CategoriesController@index');
