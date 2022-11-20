<?php

namespace App\Providers;

use App\Services\FixedNumber;
use App\Services\RandomNumber;
use App\View\Components\showMore;
use App\Contracts\NumberInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NumberInterface::class, function() {
            return rand(1,100) <= 30 ? new RandomNumber() : new FixedNumber();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('show-more', showMore::class);
    }
}
