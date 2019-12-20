<?php

namespace App\Providers;

use App\Repositories\MenuRepository;
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
        $this->publishes([
            __DIR__.'/../../vendor/almasaeed2010/adminlte' => public_path('vendor/adminlte'),
        ], 'public');

        view()->composer('backends.layouts.app', function($view) {
            $view->with('buildTreeMenu', MenuRepository::setUpMenu());
        });
    }
}
