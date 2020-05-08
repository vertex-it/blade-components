<?php

namespace VertexIt\BladeComponents;

use Illuminate\Support\ServiceProvider;

class BladeComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'blade-components');

        BladeComponentsFacade::register();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/blade_components.php' => config_path('blade_components.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/resources/views' => resource_path('views/vendor/blade-components'),
            ], 'views');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/blade_components.php', 'blade_components');

        // Register the main class to use with the facade
        $this->app->singleton('blade-components', function () {
            return new BladeComponents;
        });
    }
}
