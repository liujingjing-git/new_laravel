<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GoodsModel;
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
    public function detail($goods_id)
    {
        $goods = GoodsModel::find($goods_id);
        return view('cart/detail',['goods'=>$goods]);
    }
    /**
     * 商品列表
     */
    public function product()
    {
       $prolist=GoodsModel::orderby('goods_id','DESC')->limit(6)->get();
        return view('cart/product',['prolist'=>$prolist]);
    }
}
