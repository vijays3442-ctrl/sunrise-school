<?php

namespace App\Providers;

use App\Services\PageImageRegistry;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PageImageRegistry::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (request()->server('HTTP_X_FORWARDED_PROTO') === 'https' || str_contains(request()->server('HTTP_HOST', ''), 'trycloudflare.com')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
