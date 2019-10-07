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
Route::name('api.')->group(function () {
    Route::apiResource('users', 'UserController');
    Route::get('users/{user}/books', 'UserController@books')->name('user.books');
    Route::apiResource('books', 'BookController');
    Route::post('books/{book}/ratings', 'RatingController@store')->name('book.ratings');
});