<?php

namespace Novuslogics\AdminPanel;

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
        ]);
    }
}