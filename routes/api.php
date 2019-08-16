<?php

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

Route::apiResource('users', 'UserController');
Route::get('users/{user}/books', 'UserController@books');
Route::apiResource('books', 'BookController');
Route::post('books/{book}/ratings', 'RatingController@store');
