<?php

namespace Inggo\OFM;

use Illuminate\Support\ServiceProvider;

class OFMServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Inggo\OFM', function ($app) {
            return new OFM(config('ofm'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config.php' => config_path('ofm.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }
}
