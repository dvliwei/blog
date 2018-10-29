<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/6/25
 * Time: 上午11:39
 */

namespace Aex\CurrentAction\Facades;
use Illuminate\Support\Facades\Facade;
class CurrentAction extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'currentaction';
    }
}