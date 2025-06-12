<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteVisit;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $visit = SiteVisit::first();
            View::share('total_visits', $visit ? $visit->count : 0);
        });
    }
}
