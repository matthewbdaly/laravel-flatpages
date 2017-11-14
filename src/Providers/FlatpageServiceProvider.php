<?php

namespace Matthewbdaly\LaravelFlatpages\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider for flat pages
 */
class FlatpageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
