<?php

namespace Kusikusi;

use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'kusikusi_website');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Publish the config
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('kusikusi_website.php'),
            ], 'config');

            // Publish controllers
            $this->publishes([
            __DIR__.'/../src/Http/Controllers/HtmlController.php' => app_path('Http/Controllers/HtmlController.php'),
            ], 'controller');

            // Publish Laravel route
            $this->publishes([
            __DIR__.'/../routes/website.php' => base_path('routes/kusikusi_website.php'),
            ], 'routes');
            
            // Publish Lumen route
            /* $this->publishes([
            __DIR__.'/../routes/website-lumen.php' => base_path('routes/website.php'),
            ], 'route-lumen'); */
        }
    }
}
