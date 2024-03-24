<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
        if (Auth::guard('shop_owner')->check()) {
            $id = Auth::guard('shop_owner')->user()->id;
            $query = Shop::with('shop_owner')->where('so_id', $id)->first();
            View::share('query', $query);
        }
    }
}
