<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('coef', DB::table('settings')->value('coef'));
        View::share('cat', DB::table('categories')
            ->where('parent_id', '>',0)
            ->whereNull('deleted_at')
            ->limit(6)
            ->get());;
        View::share('category_public', DB::table('categories')
            ->where('parent_id', 0)
            ->whereNull('deleted_at')
            ->limit(6)
            ->get());
    }
}
