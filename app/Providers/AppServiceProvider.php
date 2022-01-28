<?php

namespace App\Providers;

use App\Models\Key;
use App\Models\Player;
use App\Observers\KeyObserver;
use App\Observers\PlayerObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        Key::observe(KeyObserver::class);
        Player::observe(PlayerObserver::class);
    }
}
