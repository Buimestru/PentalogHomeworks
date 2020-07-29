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

Route::get('/', '\App\Http\Controllers\BookController@index');

Route::get('create', '\App\Http\Controllers\BookController@create');

Route::post('store', '\App\Http\Controllers\BookController@store');

Route::get('edit', '\App\Http\Controllers\BookController@edit');

Route::post('update', '\App\Http\Controllers\BookController@update');

Route::get('delete', '\App\Http\Controllers\BookController@delete');

Route::get('index', '\App\Http\Controllers\BookController@index');

