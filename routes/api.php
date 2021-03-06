<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api')->group(
    function () {
        Route::get('categories', 'CategoriesController@index');
        Route::get('categories/{category}/products', 'ProductsController@getByCategory');
        Route::get('search', 'SearchController@index');
        Route::post('auth/register', 'AuthController@store');
        Route::post('auth/login', 'AuthController@login');
        Route::middleware('auth:api')->post('products', 'ProductsController@store');
    }
);
