<?php

namespace App\Providers;

use App\Models\Player;
use App\Observers\PlayerObserver;
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

        Player::observe(PlayerObserver::class);
    }
}
