<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;

=======
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


>>>>>>> origin/laravel13/5-list
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
        //
<<<<<<< HEAD
=======
        Schema::defaultStringLength(191);
>>>>>>> origin/laravel13/5-list
    }
}
