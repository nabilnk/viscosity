<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('setting', function ($app) {
            return new class {
                public function get(string $key, $default = null)
                {
                    $setting = Setting::where('key', $key)->first();
                    return ($setting) ? $setting->value : value($default);
                }

                public function set(string $key, $value): void
                {
                    Setting::updateOrCreate(['key' => $key], ['value' => $value]);
                }
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}