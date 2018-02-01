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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/cms/book', 'BookController@index')->name('listbook');
Route::get('/cms/book/add/{id?}', 'BookController@add');
Route::post('/cms/book/add', 'BookController@store');
Route::post('/cms/book/update', 'BookController@store');
Route::get('/cms/book/delete/{id}', 'BookController@delete');

Route::get('/cms/impression/{id?}', 'ImpressionController@index')->name('listimpression');
Route::get('/cms/impression/add/{bookId}/{id}', 'ImpressionController@add');
Route::post('/cms/impression/add', 'ImpressionController@store');
Route::post('/cms/impression/update', 'ImpressionController@store');
Route::get('/cms/impression/delete/{bookId}/{id?}', 'ImpressionController@delete');

Route::get('/cms/pageNotFound', function(){
    return View('common.error');
})->name('pageNotFound');