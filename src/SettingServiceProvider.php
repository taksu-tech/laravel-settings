<?php
namespace Taksu\Settings;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('setting', function ($app) {
            return new Setting($app);
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
