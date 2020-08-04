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

/**
 * Book routes
 */

Route::get('/', 'BookController@index');

Route::get('create', 'BookController@create');

Route::post('store', 'BookController@store');

Route::get('edit/{id}', 'BookController@edit');

Route::put('update/{id}', 'BookController@update');

Route::delete('delete/{id}', 'BookController@delete');

Route::get('index', 'BookController@index');

/**
 * Author routes
 */

Route::get('authors', 'AuthorController@index');

Route::get('createAuthor', 'AuthorController@create');

Route::post('storeAuthor', 'AuthorController@store');

Route::get('editAuthor/{id}', 'AuthorController@edit');

Route::put('updateAuthor/{id}', 'AuthorController@update');

Route::delete('deleteAuthor/{id}', 'AuthorController@delete');

Route::get('author/{id}', 'AuthorController@show');

/**
 * Publisher routes
 */

Route::get('publishers', 'PublisherController@index');

Route::get('createPublisher', 'PublisherController@create');

Route::post('storePublisher', 'PublisherController@store');

Route::get('editPublisher/{id}', 'PublisherController@edit');

Route::put('updatePublisher/{id}', 'PublisherController@update');

Route::delete('deletePublisher/{id}', 'PublisherController@delete');

Route::get('publisher/{id}', 'PublisherController@show');
