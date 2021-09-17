<?php

namespace NovusLogics\AdminPanel;

use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__ . '/config/admin_panel.php' => config_path('admin_panel.php'),
            __DIR__ . '/Helpers/' => app_path('Helpers'),
            __DIR__ . '/public/assets/' => public_path('assets'),
            __DIR__ . '/Http/Controllers' => app_path('Http/Controllers'),
            __DIR__ . '/Http/Requests' => app_path('Http/Requests'),
            __DIR__ . '/View/Components/' => app_path('View/Components'),
            __DIR__ . '/views/' => resource_path('views'),
        ], 'admin_panel');
    }

    public function register()
    {

    }
}
