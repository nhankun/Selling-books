<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         // Using class based composers...
        View::composer(
            '*', 'App\Http\ViewComposers\CategoryComposer'
            
        );  
        View::composer(
            '*', 'App\Http\ViewComposers\AuthorComposer'
        );
        View::composer(
            '*', 'App\Http\ViewComposers\BookComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
