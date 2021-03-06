<?php

namespace Novuslogics\AdminPanel;

use Novuslogics\AdminPanel\View\Components\AppLayout;
use Novuslogics\AdminPanel\View\Components\GuestLayout;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/admin_panel.php', 'admin_panel'
        );
    }

    public function boot()
    {
        // Config
        $this->publishes([
            __DIR__ . '/../config/admin_panel.php' => config_path('admin_panel.php'),
        ], 'admin-config');

        // Assets
        $this->publishes([
            __DIR__ . '/../public/assets/' => public_path('assets'),
        ], 'admin-assets');

        // Routes
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin_panel');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/admin_panel'),
        ], 'admin-views');

        // Components
        $this->loadViewComponentsAs('admin_panel', [
            AppLayout::class,
            GuestLayout::class,
        ]);
    }
}