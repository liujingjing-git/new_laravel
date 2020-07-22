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
Route::get('/user/vfindpass','UserController@vfindpass'); //找回密码
Route::post('/user/findpass','UserController@findpass'); //找回密码
Route::get('/user/resetpass','UserController@vresetpass'); //重置密码
Route::post('/user/resetpass','UserController@resetpass'); //重置密码




//首页
Route::get('/','IndexController@index');
Route::get('/test','IndexController@test');

//购物车
Route::get('/cart','CartController@cart'); //购物车
Route::get('/detail','CartController@detail'); //商品详情页
Route::get('/product','CartController@product'); //商品列表


//我的收藏
Route::get('/collection','ListController@collection'); //收藏页
Route::get('/blog','ListController@blog');//;历史记录
Route::post('/comments','ListController@comments');  //添加评论


