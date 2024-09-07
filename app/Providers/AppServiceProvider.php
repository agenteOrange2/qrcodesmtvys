<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\QrScan;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::check()) {
                // Obtener el número de escaneos realizados por el usuario autenticado
                $scanCount = QrScan::where('user_id', Auth::id())->count();
                // Compartirlo con todas las vistas
                $view->with('scanCount', $scanCount);
            }
        });
    }
}
