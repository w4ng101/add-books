<?php

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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'BookController@index');
    Route::get('/books/{id}/delete', 'BookController@delete');
    Route::get('export','BookController@export')->name('export');
    Route::get('exportxml','BookController@exportxml')->name('exportxml');
    Route::resource('roles','RoleController');
    Route::resource('books','BookController');
});
Auth::routes();

