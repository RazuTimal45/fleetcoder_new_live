<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share settings with all views
        if (!app()->runningInConsole()) {
            $settings = \App\Models\Setting::first() ?? new \App\Models\Setting([
                'title' => config('app.name', 'Laravel'),
                'theme_color_1' => '#6366f1',
                'theme_color_2' => '#8b5cf6',
            ]);
            view()->share('siteSettings', $settings);
        }
    }
}
