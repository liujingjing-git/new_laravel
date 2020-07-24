<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CommentsModel;
use App\Model\UserModel;
use App\Model\CollectModel;

class ListController extends Controller
{
    /**
     * 我的收藏
     */
    public function collection()
    {
        return view('list/collection');
    }

    /**
     * 收藏逻辑
     */
    public function collectDo(Request $request)
    {
        $goods_id = $request->input('goods_id');
        $is_del = $request->input('is_del');
        // echo $is_del;

        $user_id = $this->userId();
        if(empty($user_id)){
            echo "请先登录!";
            header("refresh:1;url=/user/login");die;
        }
        $goods = CollectModel::where(['goods_id'=>$goods_id])->first();
        if($goods==""){
            $data = [
                'user_id'   => $user_id,
                'goods_id'  => $goods_id,
                'add_time'  => time()
            ];
            $res = CollectModel::insertGetId($data);  
        }else {
            CollectModel::where(['goods_id'=>$goods_id])->update(['is_del'=>$is_del]);
            echo $this->json('0','成功');
            // echo 123;
        }
    }

    /**
     * 历史记录
     */
    public function blog()
    {
        return view('blog');
    }

    /**
     * 添加评论
     */
    public function comments(Request $request)
    {
        $user_name = session('user_name');
        $user_id = UserModel::where(['user_name'=>$user_name])->value('user_id');
        //  判断是否登陆
        if(empty($user_id)){
            echo "请先登录!";
            header("refresh:1;url=/user/login");die;
        }
        $subject = $request->input('subject');
        $content = $request->input('content');
        $goods_id = $request->input('goods_id');

        $add_time = time();
        $data = [
            'user_id'   => $user_id,
            'subject'   => $subject,
            'content'   => $content,
            'add_time'  => $add_time,
            'goods_id' => $goods_id
        ];
        $res = CommentsModel::insertGetId($data);
        if($res>0){
            echo "评论成功";
            header("refresh:1;url=/detail/".$goods_id);
        }else{
            echo "网络异常,请稍后重试...";
            header("refresh:1;url=/detail/".$goods_id);
        }
    }
}
