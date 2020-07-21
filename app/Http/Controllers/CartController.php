<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * 购物车
     */
    public function cart()
    {
        return view('cart/cart');
    }
    /**
     * 商品详情页
     */
    public function detail()
    {
        return view('cart/detail');
    }
    /**
     * 商品列表
     */
    public function product()
    {
        return view('cart/product');
    }
}
