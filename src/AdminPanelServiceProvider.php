<?php

namespace NovusLogics\AdminPanel;

use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/admin_panel.php' => config_path('admin_panel.php'),
            __DIR__ . '/Helpers/' => app_path('Helpers'),
            __DIR__ . '/View/Components/' => app_path('View/Components'),
            __DIR__ . '/views/layout/' => resource_path('views/layout'),
            __DIR__ . '/public/assets/' => public_path('assets'),
        ], 'admin_panel');
    }

    public function register()
    {

    }
}
