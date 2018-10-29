<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/5/15
 * Time: 下午2:30
 */
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class TokenManageFacade extends  Facade{
    protected static function getFacadeAccessor()
    {
        return 'token.manage';
    }
}