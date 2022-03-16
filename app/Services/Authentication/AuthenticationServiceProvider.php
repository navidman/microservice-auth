<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('authentication', function() {
            return App::make('App\Services\Authentication\AuthenticationService');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
