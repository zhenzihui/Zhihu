<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CreateMiddleware
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
            abort(500,"请登录或激活邮箱");
        }
        return $next($request);
    }
}
