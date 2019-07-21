<?php

namespace Ensensis\LaravelBac;

use Illuminate\Support\ServiceProvider;

class LaravelBacServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bac.php' => config_path('bac.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bac', function($app)
        {
            return new Bac();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bac'];
    }
}