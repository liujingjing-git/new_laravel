<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CommentsModel;
use App\Model\GoodsModel;
use App\Model\CartModel;
use App\Model\CollectModel;

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
        $comment = CommentsModel::join('p_user','p_user.user_id','=','p_comments.user_id')
                                ->where(['goods_id'=>$goods_id])
                                ->orderBy('add_time','DESC')
                                ->first();
        if($comment){
            $comment = $comment->toArray();
        }
                        
        $user_id = $this->userId();
        $del = CollectModel::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->value('is_del');
        // print_r($comment);die;
        $goods = GoodsModel::find($goods_id);
        return view('cart/detail',['goods'=>$goods,'data'=>$comment,'del'=>$del]);
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
