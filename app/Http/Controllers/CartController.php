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
    public function detail()
    {
        return view('cart/detail');
    }
    /**
     * 商品列表
     */
    public function product(Request $request)
    {
//        $page = empty(input('page')) ? 1 : input('page');
//        $pageSize=8;
//        $goodsList=shop_goods::page($page,$pageSize)->order('goods_id ASC')->select();


        $page = isset($page)?$request['page']:1;

        $prolist=GoodsModel::orderby('goods_id','DESC')->paginate(6);





        return view('cart/product',['prolist'=>$prolist]);
    }
}
