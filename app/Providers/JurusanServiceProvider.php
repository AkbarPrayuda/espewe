<?php

namespace App\Providers;

use App\Services\JurusanService;
use Illuminate\Support\ServiceProvider;

class JurusanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(JurusanService::class, function ($app) {
            return new JurusanService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
