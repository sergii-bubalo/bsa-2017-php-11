<?php

namespace App\Providers;

use App\Request\Contract\SaveCarRequest;
use Illuminate\Support\ServiceProvider;

class SaveCarRequestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SaveCarRequest::class, \App\Request\SaveCarRequest::class);
    }
}
