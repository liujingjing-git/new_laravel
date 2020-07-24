<?php

namespace App\Http\Middleware;

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if(!session('user_name')){
        //     header("refresh:3;url=/user/login");
        //     echo "请先登录";die;
        $u = session('user_name');
        if(empty($u)){
            echo "请先登录";
            header("refresh:3;url=/user/login");die;
        }
        return $next($request);
    }
}
