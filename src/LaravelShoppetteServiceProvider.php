<?php

namespace Vanderb\LaravelShoppette;

use Vanderb\LaravelShoppette\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class LaravelShoppetteServiceProvider extends ServiceProvider {

    public function boot() {

        // Publish config
        $this->publishes([
            __DIR__.'/../config/laravel-shoppette.php' => config_path('laravel-shoppette.php'),
        ],'config');

        // Load API routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__.'/../migrations/simple' => database_path('migrations'),
        ], 'simple');

        $this->publishes([
            __DIR__.'/../migrations/translatable' => database_path('migrations'),
        ], 'translatable');

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
