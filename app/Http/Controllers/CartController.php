<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CommentsModel;

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
        $comment = CommentsModel::orderBy('add_time','DESC')->first();
        return view('cart/detail',['data'=>$comment]);
    }
    /**
     * 商品列表
     */
    public function product()
    {
        return view('cart/product');
    }
}
