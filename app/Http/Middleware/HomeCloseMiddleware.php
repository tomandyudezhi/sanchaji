<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Configs;

class HomeCloseMiddleware
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
        //获取网站配置数据
        $configs = Configs::find(1);
        if($configs['switch'] == 'y'){
            return redirect('/webclose');
        } else {
            return $next($request);
        }
        
    }
}
