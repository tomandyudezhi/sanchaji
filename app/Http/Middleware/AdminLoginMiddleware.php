<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        if(session('adminFlag') == true){
            return $next($request);
        }else{
            return redirect('/admin/login') -> with('error','请登录后再试！');
        }
        
    }
}
