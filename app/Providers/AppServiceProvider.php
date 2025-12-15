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

            // ---- Custom Required Country List ----
            $priorityCountries = [
                ['id' => 39,  'name' => 'Canada'],
                ['id' => 232, 'name' => 'United Kingdom'],
                ['id' => 233, 'name' => 'United States'],
                ['id' => 14,  'name' => 'Australia'],
            ];

            // Extract IDs for query
            $countryIds = collect($priorityCountries)->pluck('id')->toArray();

            // ---- Fetch states from DB based on these IDs ----
            $footerStates = Cache::rememberForever('footer_priority_states', function () use ($countryIds) {
                return State::query()
                    ->whereIn('country_id', $countryIds)
                    ->where('is_active', 1)
                    ->orderBy('name')
                    ->get(['id', 'name', 'country_id']);
            });

            // Send both manual country list + states to footer
            $view->with([
                'footerStates'      => $footerStates,
            ]);
        });
    }
}
