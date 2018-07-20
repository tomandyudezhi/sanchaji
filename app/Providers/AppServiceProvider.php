<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FriLinks;
use App\Models\Reviews;
use App\Models\Adverts;
use App\Models\Configs;
use App\Models\Users;
use App\Models\Articles;
use Cache;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	if(Cache::has('share_data')){
		$share_data = Cache::get('share_data');	
	}else{
         //获取注册总数
        $user_count = count(Users::get());
        //获取发表博客总数
        $article = Articles::get();
        $article_count = count($article);
        //获取当月发表博客数目
        $arr = [];
        foreach ($article as $k => $v) {
            if($v -> created_at > date('Y-m',time()) && $v -> created_at < date('Y-m',strtotime('+1 month'))){
                $arr[] = $v;
            }
        }
        $article_month_count = count($arr);
        //评论总数
        $review_count = count(Reviews::get());
        //获取管理员
        $man = Users::where('qx','=',1) -> get();
        //获取最新的五条博客
        $new_data = Articles::orderBy('created_at','desc') -> limit(5) -> get();

        $configs_data = Configs::find(1);
        $review_data = Reviews::orderBy('created_at','desc') -> limit(4)->get();
        $adverts_data = Adverts::get();
        $frilink_data = FriLinks::get();
	$share_data = ['frilink_data'=>$frilink_data,'review_data'=>$review_data,'adverts_data'=>$adverts_data,'configs_data'=>$configs_data,'user_count'=>$user_count,'article_count'=>$article_count,'article_month_count'=>$article_month_count,'review_count'=>$review_count,'man'=>$man,'new_data'=>$new_data];
	Cache::put('share_data',$share_data,40);
	}
        view()->share($share_data); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
