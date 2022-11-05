<?php

namespace Madeadi\Settings;

use Illuminate\Support\ServiceProvider as Base;

class ServiceProvider extends Base
{
    public function register()
    {
        $this->app->singleton(SettingService::class, function ($app) {
            return new SettingService();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (!class_exists('CreateSettingsTable')) {
                $this->publishes([
                    __DIR__ . '/database/migrations/2021_12_07_070614_create_settings_table.php' => database_path('migrations/' . '2021_12_07_070614_create_settings_table.php'),
                ], 'migrations');
            }
        }
    }
}
