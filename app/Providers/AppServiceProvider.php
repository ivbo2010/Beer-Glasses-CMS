<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    public function boot()
    {
        view()->composer(
            [
                'layouts.app',
            ],
            function ($view) {
                $view->with('settings', Setting::all());
            });
    }


    public function register()
    {
        //
    }

}
