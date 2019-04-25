<?php

namespace Vanderb\LaravelShoppette;

use Vanderb\LaravelShoppette\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;
use Vanderb\LaravelShoppette\Middleware\ProtectCartApi;
use Illuminate\Support\Facades\Event;

class LaravelShoppetteServiceProvider extends ServiceProvider {

    public function boot() {

        // Publish config
        $this->publishes([
            __DIR__.'/../config/laravel-shoppette.php' => config_path('laravel-shoppette.php'),
        ],'config');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__.'/../resources/migrations/simple' => database_path('migrations'),
        ], 'simple');

        $this->publishes([
            __DIR__.'/../resources/migrations/translatable' => database_path('migrations'),
        ], 'translatable');

        // register middleware
        $this->app['router']->aliasMiddleware('protectCartApi', ProtectCartApi::class);

        // Register install command
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
        }
        //Register events
        Event::listen('Vanderb\LaravelShoppette\Events\CartUpdated','Vanderb\LaravelShoppette\Listeners\UpdateCart');


    }

    /**
     * Register the service provider.
     */
    public function register(){
        $this->app->bind('Vanderb\LaravelShoppette\Contracts\CartContract', Services\CartService::class);
        $this->app->bind('Vanderb\LaravelShoppette\Contracts\ShippingContract', Services\ShippingService::class);
    }
}
