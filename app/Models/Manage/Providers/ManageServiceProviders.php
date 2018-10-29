<?php

namespace App\Models\Manage\Providers;




use App\Models\Manage\Service\ManageService;
use Folklore\GraphQL\ServiceProvider;

class ManageServiceProviders extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton('manage.manage',function($app){
            return new ManageService();
        });


    }
}
