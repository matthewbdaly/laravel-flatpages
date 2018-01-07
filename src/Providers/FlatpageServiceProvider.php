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
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'flatpages');
        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/flatpages'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage', function () {
            $baseRepo = new \Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Flatpage(new \Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage);
            $cachingRepo = new \Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Decorators\Flatpage($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
