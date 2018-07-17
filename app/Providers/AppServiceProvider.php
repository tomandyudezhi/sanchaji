<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FriLinks;
use App\Models\Reviews;
use App\Models\Adverts;
use App\Models\Configs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configs_data = Configs::find(1);
        $review_data = Reviews::orderBy('created_at','desc')->limit(4)->get();
        $adverts_data = Adverts::get();
        $frilink_data = FriLinks::get();
        view()->share(['frilink_data'=>$frilink_data,'review_data'=>$review_data,'adverts_data'=>$adverts_data,'configs_data'=>$configs_data]);
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
