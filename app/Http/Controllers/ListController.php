<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CommentsModel;

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

        $user = $request->input('user');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $content = $request->input('content');
        $goods_id = $request->input('goods_id');

        $add_time = time();
        // TODO 判断是否登陆
        $data = [
            'user'  => $user,
            'email' => $email,
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
