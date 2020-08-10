<?php

use Illuminate\Support\Facades\Auth;
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

/**
 * User routes
 */

Route::get('users', 'UserController@index');

Route::get('createUser', 'UserController@create');

Route::post('storeUser', 'UserController@store');

Route::get('editUser/{id}', 'UserController@edit');

Route::put('updateUser/{id}', 'UserController@update');

Route::delete('deleteUser/{id}', 'UserController@delete');

Route::get('user/{id}', 'UserController@show');

/**
 * Borrowing routes
 */

Route::get('borrowings', 'BorrowingController@index');

Route::get('createBorrowing/{user_id}', 'BorrowingController@create');

Route::post('storeBorrowing', 'BorrowingController@store');

Route::put('updateBorrowing/{id}', 'BorrowingController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');
