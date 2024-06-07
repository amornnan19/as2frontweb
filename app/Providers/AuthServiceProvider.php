<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('eloquent', function ($app, array $config) {
            return new EloquentUserProvider($app['hash'], $config['model']);
        });
    }
}
