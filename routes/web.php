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

Route::get('/user/reg','UserController@register'); //注册
Route::post('/user/regdo','UserController@register_do'); //执行注册
Route::get('/user/login','UserController@login'); //登录
Route::post('/user/logindo','UserController@login_do'); //执行登录