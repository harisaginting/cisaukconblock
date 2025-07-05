<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Settings;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share settings with all views
        View::composer('*', function ($view) {
            $settings = Cache::remember('view.settings', 3600, function () {
                return Settings::getAllAsArray();
            });
            
            $view->with('settings', $settings);
        });

        // Add settings helper to the application
        $this->app->singleton('settings', function () {
            return new class {
                public function get(string $key, $default = null)
                {
                    return Settings::getValue($key, $default);
                }

                public function set(string $key, $value, ?string $updatedBy = null): bool
                {
                    return Settings::setValue($key, $value, $updatedBy);
                }

                public function all(): array
                {
                    return Settings::getAllAsArray();
                }

                public function clearCache(): void
                {
                    Settings::clearCache();
                }
            };
        });
    }
} 