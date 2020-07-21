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



//登录注册
Route::get('/user/reg','UserController@register'); //注册
Route::post('/user/regdo','UserController@register_do'); //执行注册
Route::get('/user/login','UserController@login'); //登录
Route::post('/user/logindo','UserController@login_do'); //执行登录

//首页
Route::get('/','IndexController@index');


//购物车
Route::get('/cart','CartController@cart'); //购物车
Route::get('/detail','CartController@detail'); //商品详情页
Route::get('/product','CartController@product'); //商品列表


//我的收藏
Route::get('/collection','ListController@collection'); //收藏页
Route::get('blog','ListController@blog');//;历史记录


