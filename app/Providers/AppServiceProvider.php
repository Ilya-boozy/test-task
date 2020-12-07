<?php

namespace App\Providers;

use App\Order;
use App\Services\DatabaseService;
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
        $this->app->bind(DatabaseService::class, function ($app) {
            return new DatabaseService(new Order());
        });

        $this->app->bind(Order::class, function (){
            return new Order();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
