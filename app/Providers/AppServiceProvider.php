<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FriLinks;
use App\Models\Reviews;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $review_data = Reviews::orderBy('created_at','desc')->distinct('aid')->limit(10)->get();
        $frilink_data = FriLinks::get();
        view()->share(['frilink_data'=>$frilink_data,'review_data'=>$review_data]);
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
