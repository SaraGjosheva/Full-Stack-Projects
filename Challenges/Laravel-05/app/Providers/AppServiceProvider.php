<?php

namespace App\Providers;

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

    public function boot()
    {
        // once the container is booted, grab the scheduler…
        $this->app->booted(function () {
            /** @var Schedule $schedule */
            $schedule = $this->app->make(Schedule::class);

            // …and schedule your command exactly as you would in Kernel
            $schedule->command('matches:randomize-recent')
                ->daily();
        });
    }
}
