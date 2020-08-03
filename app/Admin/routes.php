<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('goods', GoodsController::class);
    $router->resource('admin', UserController::class);
    $router->resource('cartgory', CartController::class);
    $router->resource('order', OrderController::class);
    $router->resource('order_goods', OrderGoodsController::class);
    $router->resource('voder', VoderController::class);
});
