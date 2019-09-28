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

Route::get('/category','CategoryController@index');
Route::get('/category/create','CategoryController@create');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{id}/show','CategoryController@show');
Route::get('/category/{id}/edit', 'CategoryController@edit');
Route::post('/category/{id}/edit', 'CategoryController@update');
Route::get('/category/{id}/delete', 'CategoryController@delete');

