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

//upload

Route::group(['namespace' => 'Upload'], function(){
Route::get('upload','UploadController@index');
Route::post('upload','UploadController@store');


});







//用戶註冊登入相關
Route::group(['namespace' => 'User'], function(){
    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@register');
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
    //下三個還沒寫好
    Route::get('/user/self', 'UserController@index');
    Route::get('/user/self/set', 'UserController@set');
    Route::post('/user/self/set', 'UserController@store');
});



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
Route::delete('/posts/{post}', '\App\Http\Controllers\PostController@delete');
