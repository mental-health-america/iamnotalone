<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (env('APP_ENV', 'Production') == "production") {
            URL::forceScheme('HTTPS');
        }
    }
}

mysql: //bf4af541d370ed:85e9fba4@us-cdbr-east-03.cleardb.com/heroku_bb0b4e2c50dcf8d?reconnect=true

