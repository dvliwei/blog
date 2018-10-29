<?php

declare(strict_types=0);
namespace App\Models\Manage\Facade;



use Illuminate\Support\Facades\Facade;

/**
 * 创建一个静态指向 Manage 类的门面类 ManageFacade
 * Class ManageFacade
 * @package App\Models\Manage\Facade
 */
class ManageFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'manage.manage';
    }
}
