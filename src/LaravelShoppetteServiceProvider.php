<?php

namespace Vanderb\LaravelShoppette;

use Vanderb\LaravelShoppette\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class LaravelShoppetteServiceProvider extends ServiceProvider {

    public function boot() {
        // Publish config
/*        $this->publishes([
            __DIR__.'/../resources/config/laravel-shoppette.php' => config_path('laravel-shoppette.php'),
        ],'config');*/

        // Load API routes
        //$this->loadRoutesFrom(__DIR__.'/../resources/routes/web.php');

        // Load migrations
        //$this->loadMigrationsFrom(__DIR__.'/../resources/migrations');


        // Register install command
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
        }

    }

    /**
     * Register the service provider.
     */
    public function register(){

    }
}
