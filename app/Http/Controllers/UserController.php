<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use App\Model\FindPassModel;
use App\Model\FindpassModel as ps;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;  
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * 首页
     */
    public function index()
    {
        return view('index');
    }
    
    /**
     * 注册
     */
    public function register()
    {
        return view('user/register');
    }
    /**
     * 执行注册
     */
    public function register_do()
    {
        $user_name  = request()->input('user_name');
        $user_email = request()->input('user_email');
        $password   = request()->input('password');
        //加密
        $password = password_hash($password,PASSWORD_BCRYPT); 
        //入库
        $user_data = [
           'user_name' => $user_name,
           'user_email' => $user_email,
           'password'  => $password,
        ];

        $u = UserModel::insertGetId($user_data);
        header("refresh:2;url=/user/login");
        echo "注册成功";

    }

    /**
     * 登录
     */
    public function login()
    {
        return view('user/login');
    }
    /**
     * 执行登录
     */
    public function login_do()
    {
        $user_name = request()->input('user_name');
        $password  = request()->input('password');
        $u = UserModel::where(['user_name'=>$user_name])->orWhere(['user_email'=>$user_name])->first();
        if($u == NULL)
        {
            header("refresh:3;url=/user/login");
            echo "该用户不存在";die;
        }
        
        // $password  = request()->input('password');
        // if (!Hash::check($password, $u['password'])) {
        //     echo "密码有误";
        //     die;
        // }
        //存session
        session(['user_name' => $u['user_name']]);
        
        header("refresh:3;url=/");
        echo "登录成功 正在跳转至首页...";
    }

    /**
     * 退出登录
     */
    public function login_out()
    {
        $a = session(['user_name'=>null]);
        header("refresh:3;url=/");
        echo "退出成功...";
    }

    /**
     * 找回密码
     */
    public function vfindpass()
    {
        $data = [];
        return view('user/vfindpass',$data);
    }
    /**
     * 执行
     */
    public function findPass()
    {
        $user_name = request()->input('u');
        $u = UserModel::where(['user_name'=>$user_name])->orWhere(['user_email'=>$user_name])->first();
        //找到用户 发送邮件
        if($u)
        {
            $token = Str::random(32);
            $data = [
                'user_id'   => $u->user_id,
                'token'     => $token,
                'status'    => 0,
                'expire'    => time() + 3600    // 一小时内修改
            ];
            FindpassModel::insertGetId($data);

            //生成密码重置连接
            $data = [
                'url'   => env('APP_URL'). '/user/resetpass?token='.$token
            ];
            Mail::send('email.findpass',$data,function($message){
                $to = [
                    '1807578838@qq.com',
                ];
                $message->to($to)->subject('密码重置');
            });
            header("refresh:2;url=/user/login");
            echo "密码重置链接已发送至 " . $u->user_email;
        }
    }
    /**
     * 重置密码
     */
    public function vresetpass()
    {
        //验证token是否有效
        $token = request()->input('token');
        if(empty($token)){
            die("未授权 缺少token");
        }

        $data = [
            'token' => $token
        ];

        return view('user/resetpass',$data);
    }    
    /**
     * 重置密码
     */
    public function resetpass()
    {
        $password = request()->input('password');
        $token = request()->input('token');
        //验证token
        $u = FindpassModel::where(['token'=>$token])->orderBy("id","desc")->first();
        if(empty($u)){
            die("未授权 token无效");
        }

        echo '<pre>';print_r($u->toArray());echo '</pre>';

        if($u->expire < time())
        {
            die('token已过期');
        }
        if($u->status==1){
            die("token 已被使用");
        }
        $user_id = $u->user_id;
        $new_pass = password_hash($password,PASSWORD_BCRYPT);
        echo $new_pass;

        //更新密码
        UserModel::where(['user_id'=>$user_id])->update(['password'=>$new_pass]);

        //设置token状态为 已使用
        FindpassModel::where(['token'=>$token])->update(['status'=>1]);
        echo '<br>';
        echo "密码重置成功";

    }

    /**
     * 修改密码
     */
    public function changepass()
    {
        return view('user/changepass');
    }
    /**
     * 执行修改密码
     */
    public function dochangepass()
    {
        $post = request()->except('_token'); 
    }
}
