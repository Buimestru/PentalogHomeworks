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

Route::get('/', 'BookController@index');

Route::get('create', 'BookController@create');

Route::post('store', 'BookController@store');

Route::get('edit', 'BookController@edit');

Route::post('update', 'BookController@update');

Route::get('delete', 'BookController@delete');

Route::get('index', 'BookController@index');

Route::get('authors', 'AuthorController@index');

Route::get('addAuthor', 'AuthorController@create');

Route::post('storeAuthor', 'AuthorController@store');

Route::get('editAuthor/{id}', 'AuthorController@edit');

Route::post('updateAuthor/{id}', 'AuthorController@update');

Route::get('deleteAuthor/{id}', 'AuthorController@delete');

Route::get('author/{id}', 'AuthorController@show');

Route::get('publishers', 'PublisherController@index');

Route::get('addPublisher', 'PublisherController@create');

Route::post('storePublisher', 'PublisherController@store');

Route::get('editPublisher/{id}', 'PublisherController@edit');

Route::post('updatePublisher/{id}', 'PublisherController@update');

Route::get('deletePublisher/{id}', 'PublisherController@delete');

Route::get('publisher/{id}', 'PublisherController@show');
