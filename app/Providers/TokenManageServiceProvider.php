<?php

namespace App\Providers;

use App\Services\TokenMangeService;
use Illuminate\Support\ServiceProvider;

class TokenManageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('token.manage', function($app){
            return new TokenMangeService();
        });
    }
}
