<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
// Livewire component registration (guarded by class_exists checks)
use Livewire\Livewire as LivewireFacade;


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
    public function boot()
    {
        Carbon::setLocale('id');
        // Explicitly register Livewire components to avoid alias lookup issues
        if (class_exists(\Livewire\Livewire::class) && class_exists(\App\Http\Livewire\Admin\UserManagement::class)) {
            \Livewire\Livewire::component('admin.user-management', \App\Http\Livewire\Admin\UserManagement::class);
        }
    }
}
