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
Route::get('/test', function () {
    return view('post/create');
});
//post的CRUD
Route::get('/posts', 'PostController@index');
//加數字限定的原因是這個寫法(不使用resource)會導致action show 跟 cteate 的衝突 '/posts/create' and '/posts/{post}'
//{}如果不限定,就啥參數都吃進去，包含create
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show')->where('post', '[1-9][0-9]?');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
Route::get('/posts/delete', '\App\Http\Controllers\PostController@delete');
