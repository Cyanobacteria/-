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

//post的CRUD
Route::get('/posts', '\App\Http\Controller\PostController@index');
Route::get('/posts/{post}', '\App\Http\Controller\PostController@show');
Route::get('/posts/create', '\App\Http\Controller\PostController@create');
Route::post('/posts', '\App\Http\Controller\PostController@store');
Route::get('/posts/{post}/edit', '\App\Http\Controller\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controller\PostController@update');
Route::get('/posts/delete', '\App\Http\Controller\PostController@delete');
