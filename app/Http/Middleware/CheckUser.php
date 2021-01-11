<?php

namespace App\Http\Middleware;

use App\UserModel;
use Closure;

class CheckUser
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

        //使用中间件验证用户名和密码
            $user = UserModel::where('username',$request->get("username"))->where('password',bcrypt($request->get("password")))->first();
            if (!$user) {
                redirect("login")."<script>alert('用户名或密码错误')</script>";
            }else{
                session("user", $user);
                redirect("create");
            }

        return $next($request);
    }
}
