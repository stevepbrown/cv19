<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
           /*        
        Aliasing Components
        If your Blade components are stored in a sub-directory, you may wish to alias them for easier access. You may use the component method to alias the component from components.alert to alert. Typically, this should be done in the boot method of your AppServiceProvider:
        */


        Blade::component('laravel-components.component_head', 'head');
        Blade::component('laravel-components.component_scripts', 'scripts');
    }
}
