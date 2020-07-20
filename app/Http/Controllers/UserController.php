<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;

class UserController extends Controller
{
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
    public function logindo()
    {

    }
}
