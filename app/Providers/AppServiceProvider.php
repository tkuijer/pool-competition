<?php

namespace App\Providers;

use App\Services\StringService;
use Bugsnag;
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
        StringService::loadMacros();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bugsnag::setAppVersion(config('app.version'));
    }
}
