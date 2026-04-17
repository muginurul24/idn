<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        $this->app->booted(function () {
            $schedule = app(Schedule::class);
            $schedule->command('app:check-pending-transactions')->everyTenSeconds();
        });
    }
}
