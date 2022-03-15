<?php

namespace App\Providers;

use App\Models\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->bearerToken();
            if ($token) {
                try {
                    $decoded = JWT::decode($token, new Key(config('jwt.jwt_secret'), config('jwt.jwt_algorithm')));
                    if ($decoded->expires_in < Carbon::now()) {
                        return;
                    }
                    $user = User::find($decoded->user->id);
                    if ($user) {
                        return $user;
                    } else {
                        return;
                    }
                } catch (\Exception $exception) {
                    return;
                }
            }
        });
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
