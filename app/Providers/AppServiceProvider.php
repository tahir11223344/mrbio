<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Core\KTBootstrap;
use App\Models\State;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Update defaultStringLength
        Builder::defaultStringLength(191);

        Paginator::useBootstrapFive();

        KTBootstrap::init();

        if (app()->environment('production')) {
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/starterkit/metronic/laravel/livewire/update', $handle);
            });
        }

        View::composer('frontend.layouts.partials.footer', function ($view) {
            $footerStates = Cache::rememberForever('footer_states', function () {
                return State::query()
                    ->where('is_active', 1)
                    ->orderBy('name')
                    ->get(['id', 'name']);
            });

            $view->with('footerStates', $footerStates);
        });
    }
}
