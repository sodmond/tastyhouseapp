<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
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
        Paginator::useBootstrapFive();
        try {
            $th_categories1 = ProductCategory::where('level', 1)->get();
            $th_categories2 = ProductCategory::where('level', 2)->get();
            $th_categories3 = ProductCategory::where('level', 3)->get();
            $currency = '₦';
            View::share(compact('th_categories1', 'th_categories2', 'th_categories3', 'currency'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
