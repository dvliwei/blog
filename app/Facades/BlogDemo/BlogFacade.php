<?php

namespace App\Facades\BlogDemo;



use Illuminate\Support\Facades\Facade;

class BlogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //parent::getFacadeAccessor(); // TODO: Change the autogenerated stub
        return 'blogDemo';
    }
}
