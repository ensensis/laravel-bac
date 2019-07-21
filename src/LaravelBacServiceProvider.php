<?php

namespace Manfredjb\LaravelBac;

use Illuminate\Support\ServiceProvider;

class LaravelBacServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bac.php' => config_path('bac.php'),
        ]);
    }
}