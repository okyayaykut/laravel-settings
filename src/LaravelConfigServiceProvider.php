<?php

namespace okyayaykut\LaravelConfig;

use Illuminate\Support\ServiceProvider;

class LaravelConfigServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function boot()
    {
        $defaultConfig = __DIR__."/../config/settings.php";
        $this->publishes([$defaultConfig => config_path("settings.php")]);
        $this->mergeConfigFrom($defaultConfig, 'settings');
    }

    public function register()
    {
        $this->app->singleton('LaravelConfig', function ($app) {
            return new LaravelConfig($app);
        });
    }

    public function provides()
    {
        return ['LaravelConfig'];
    }

}