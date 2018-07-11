<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FriLinks;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $frilink_data = FriLinks::get();
        view()->share(['frilink_data'=>$frilink_data]);
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
