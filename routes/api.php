<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','UserController@login');
Route::post('register','UserController@register');
Route::get('users','UserController@getAllUsers')->middleware('auth:api');

Route::post('products','ProductController@store')->middleware('auth:api');
Route::post('product-update','ProductController@update')->middleware('auth:api');
Route::get('product/{id}','ProductController@show')->middleware('auth:api');
Route::get('product-list','ProductController@index')->middleware('auth:api');
Route::get('product-delete','ProductController@destroy')->middleware('auth:api');
