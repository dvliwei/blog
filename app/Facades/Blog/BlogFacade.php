<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/5/15
 * Time: 下午3:14
 */
namespace  App\Facades\Blog;
use Illuminate\Support\Facades\Facade;

class BlogFacade extends  Facade{
    protected static function getFacadeAccessor()
    {
        //parent::getFacadeAccessor(); // TODO: Change the autogenerated stub
        return 'blog.service';
    }
}