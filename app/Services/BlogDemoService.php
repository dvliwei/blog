<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/5/15
 * Time: 上午11:42
 */
namespace  App\Services;


use App\Contracts\BlogDemoContract;

class BlogDemoService implements  BlogDemoContract
{
    public function callMe($controller)
    {
        // TODO: Implement callMe() method.
        dd('Call Me From TestServiceProvider In '.$controller);
    }
}