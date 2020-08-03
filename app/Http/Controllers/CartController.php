<?php

namespace App\Http\Controllers;

use App\Model\VoderModel;
use Illuminate\Http\Request;
use App\Model\CommentsModel;
use App\Model\GoodsModel;
use App\Model\CartModel;

class CartController extends Controller
{
    /**
     * 购物车
     */
    public function cart()
    {
        $cart=GoodsModel::orderby('goods_id','DESC')->limit(2)->get();
        return view('cart/cart',['cart'=>$cart]);
    }
    /**
     * 商品详情页
     */
    public function detail($goods_id)
    {
        $comment = CommentsModel::where(['goods_id'=>$goods_id])->orderBy('add_time','DESC')->first();
        $goods = GoodsModel::find($goods_id);
        $vidor = VoderModel::where(['goods_id'=>$goods_id])->first();

        if($vidor){
            $goods_info['m3u8'] = $vidor->m3u8;
        }else{
            $goods_info['m3u8'] = '/video_out/456.m3u8';
        }
        $data=[
            'goods'=>$goods,
            'data'=>$comment,
            'goods_info'=>$goods_info
        ];
        return view('cart/detail',$data);
    }
    /**
     * 商品列表
     */
    public function product(Request $request)
    {
        $goods_name = $request->input('goods_name');

        $where = [];
        if(!empty($goods_name)){
            $where[]=['goods_name','like',"%$goods_name%"];
        }

        $prolist=GoodsModel::where($where)->orderby('goods_id','DESC')->limit(6)->get();
        return view('cart/product',['prolist'=>$prolist,'goods_name'=>$goods_name]);
    }
}
