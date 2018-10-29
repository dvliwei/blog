<?php

namespace App\Providers;

use App\Models\Blog\Services\BlogService;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
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
        $this->app->singleton('blog.service',function($app){
            return new BlogService();
        });
    }
}
