<?php

namespace Novuslogics\AdminPanel;

use Illuminate\Support\Facades\Route;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/admin_panel.php', 'admin_panel'
        );
    }

    public function boot()
    {
        // Config
        $this->publishes([
            __DIR__.'/../config/admin_panel.php' => config_path('admin_panel.php'),
        ], 'admin-config');

        // Assets
        $this->publishes([
            __DIR__.'/../public/assets/' => public_path('assets'),
        ], 'admin-assets');

        // Routes
        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin_panel');
    }
}