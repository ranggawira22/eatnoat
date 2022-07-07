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

Route::get('/', 'PageController@index');
Route::get('/all', 'PageController@showall');
Route::get('/category/{category}', 'PageController@filterMenuByCategory');
Route::get('/detail/{item}', 'PageController@detail');
Route::delete('/checkout/{id}', 'InvoiceController@destroy');
Route::post('/cart', 'InvoiceController@store');
Route::put('/finalize/{invoice}', 'InvoiceController@finalize');
Route::get('/checkout', 'InvoiceController@index');
Route::get('/payment', 'InvoiceController@payment');
Route::delete('/cancel/{invoice}', 'InvoiceController@cancel');
Route::get('/history','PageController@history');

// Admin/menu
Route::get('/admin', 'MenuController@index')->middleware(['admin:admin']);
Route::get('/admin/history', 'MenuController@history')->middleware(['admin:admin']);
Route::put('/admin/history/{id}', 'MenuController@edithistory')->middleware(['admin:admin']);
Route::delete('/admin/{id}', 'MenuController@destroy')->middleware(['admin:admin']);
Route::put('/admin/{id}', 'MenuController@update')->middleware(['admin:admin']);
Route::get('/admin/{id}', 'MenuController@show')->middleware(['admin:admin']);
Route::post('/add', 'MenuController@store')->middleware(['admin:admin']);
Route::get('/add', 'MenuController@create')->middleware(['admin:admin']);
Route::get('/admin/{id}/edit', 'MenuController@edit')->middleware(['admin:admin']);


// Auth routes
Route::post('/login', 'LoginController@postLogin');
Route::get('/login', 'LoginController@getLogin')->middleware('guest');
Route::get('/logout', 'LoginController@logout');
Route::post('/register', 'RegisterController@submit');
Route::get('/register', 'RegisterController@form')->middleware('guest');


