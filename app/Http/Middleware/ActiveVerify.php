<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveVerify
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


        if(Auth::user()->isActive==0||Auth::guest())
        {
//          abort("403","你未登录或未激活邮箱");
            \flash("你未登录或未激活邮箱")->overlay(null,"错误","error");
            return $next($request);
        }
        return $next($request);

    }
}
