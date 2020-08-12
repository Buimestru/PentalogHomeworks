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

Route::get('create', 'BookController@create')->middleware('auth:admin');

Route::post('store', 'BookController@store')->middleware('auth:admin');

Route::get('edit/{id}', 'BookController@edit')->middleware('auth:admin');

Route::put('update/{id}', 'BookController@update')->middleware('auth:admin');

Route::delete('delete/{id}', 'BookController@delete')->middleware('auth:admin');

Route::get('index', 'BookController@index');

/**
 * Author routes
 */

Route::get('authors', 'AuthorController@index');

Route::get('createAuthor', 'AuthorController@create')->middleware('auth:admin');

Route::post('storeAuthor', 'AuthorController@store')->middleware('auth:admin');

Route::get('editAuthor/{id}', 'AuthorController@edit')->middleware('auth:admin');

Route::put('updateAuthor/{id}', 'AuthorController@update')->middleware('auth:admin');

Route::delete('deleteAuthor/{id}', 'AuthorController@delete')->middleware('auth:admin');

Route::get('author/{id}', 'AuthorController@show');

/**
 * Publisher routes
 */

Route::get('publishers', 'PublisherController@index');

Route::get('createPublisher', 'PublisherController@create')->middleware('auth:admin');

Route::post('storePublisher', 'PublisherController@store')->middleware('auth:admin');

Route::get('editPublisher/{id}', 'PublisherController@edit')->middleware('auth:admin');

Route::put('updatePublisher/{id}', 'PublisherController@update')->middleware('auth:admin');

Route::delete('deletePublisher/{id}', 'PublisherController@delete')->middleware('auth:admin');

Route::get('publisher/{id}', 'PublisherController@show');

/**
 * User routes
 */

Route::get('users', 'UserController@index')->middleware('auth:admin');

Route::get('createUser', 'UserController@create')->middleware('auth:admin');

Route::post('storeUser', 'UserController@store')->middleware('auth:admin');

Route::get('editUser/{id}', 'UserController@edit')->middleware('auth:admin');

Route::put('updateUser/{id}', 'UserController@update')->middleware('auth:admin');

Route::delete('deleteUser/{id}', 'UserController@delete')->middleware('auth:admin');

Route::get('user/{id}', 'UserController@show')->middleware('auth:admin');

/**
 * Borrowing routes
 */

Route::get('borrowings', 'BorrowingController@index')->middleware('auth:admin');

Route::get('createBorrowing/{user_id}', 'BorrowingController@create')->middleware('auth:admin');

Route::post('storeBorrowing', 'BorrowingController@store')->middleware('auth:admin');

Route::put('updateBorrowing/{id}', 'BorrowingController@update')->middleware('auth:admin');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->middleware('auth:admin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->middleware('auth:admin');

Route::view('/admin', 'admin')->middleware('auth:admin');

