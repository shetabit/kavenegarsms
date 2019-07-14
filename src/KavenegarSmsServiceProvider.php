<?php

namespace Shetabit\KavenegarSms;

use Illuminate\Support\ServiceProvider;

class KavenegarSmsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'shetabit');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'shetabit');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kavenegarsms.php', 'kavenegarsms');

        // Register the service the package provides.
        $this->app->singleton('kavenegarsms', function ($app) {
            return new KavenegarSms;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['kavenegarsms'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/kavenegarsms.php' => config_path('kavenegarsms.php'),
        ], 'kavenegarsms.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/shetabit'),
        ], 'kavenegarsms.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/shetabit'),
        ], 'kavenegarsms.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/shetabit'),
        ], 'kavenegarsms.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
