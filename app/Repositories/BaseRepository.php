<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/7/12
 * Time: 上午10:36
 */
namespace App\Repositories;
abstract class BaseRepository{

    public function __construct()
    {

    }

    public abstract function extractForScript($webUrl);
}