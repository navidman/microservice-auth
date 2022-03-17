<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
    }

    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
