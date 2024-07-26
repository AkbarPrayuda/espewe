<?php

namespace App\Providers;

use App\Services\KelasService;
use Illuminate\Support\ServiceProvider;

class KelasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(KelasService::class, function ($app) {
            return new KelasService();
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
