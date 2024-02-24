<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;
use Roots\Acorn\View\View;
use Illuminate\Support\Facades\Route;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        
        View::composer('partials.publikacje', \App\View\Composers\PublikacjeComposer::class);
        View::composer('partials.sticky-slider', \App\View\Composers\StickyPostsComposer::class);
        View::composer('partials.latest-news', \App\View\Composers\LatestNewsComposer::class);

       
    }

}
