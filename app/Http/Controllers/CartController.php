<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CommentsModel;
use App\Model\GoodsModel;
use App\Model\CartModel;
use App\Model\CollectModel;
use App\Model\UserModel;
use App\Model\VideoModel;

class CartController extends Controller
{
    /**
     * 购物车
     */
    public function cart()
    {
        $cart=GoodsModel::orderby('goods_id','DESC')->limit(2)->get();
        return view('/cart/cart',['cart'=>$cart]);
    }

    public function carts()
    {
        $goods_id = request()->goods_id;
        // echo ($goods_id);exit;
        $buy_number = request()->buy_number;
        $user_name = session('user_name');
        $user_id=UserModel::where('user_name',$user_name)->value('user_id');
        //echo ($user_id);die;

        $goods = GoodsModel::select('goods_id')->find($goods_id);
        if($goods_id){
            echo $this->ShowMsg('00002','此商品已存在');
        }

        $data = [
            'user_id' => $user_id,
            'buy_number' => $buy_number,
            'add_time' => time(),
            'goods_id' =>$goods_id
        ];
        $res = CartModel::create($data);
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

        $video = VideoModel::where(['goods_id'=>$goods_id])->first();
        if($video){
            $goods['m3u8'] = $video->m3u8;
        }else{
            $goods['m3u8'] = "video/default.mp4"; 
        }
        // print_r($goods->toArray());die;
        return view('cart/detail',['goods'=>$goods,'data'=>$comment,'del'=>$del,'video'=>$video]);
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

        $prolist=GoodsModel::where($where)->orderby('goods_id','DESC')->paginate(6);
        return view('cart/product',['prolist'=>$prolist,'goods_name'=>$goods_name]);
    }


    function ShowMsg($code,$msg){
        $data = [
            'code' => $code,
            'msg' => $msg
        ];
        return json_encode($data,true);
    }
}
