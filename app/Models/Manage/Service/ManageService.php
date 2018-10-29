<?php

namespace App\Models\Manage\Service;


/**
 * 首先创建一个需要绑定到服务容器的 ManageService 类
 * Class ManageService
 * @package App\Models\Manage\Service
 */
class ManageService
{
    //
    public $message;

    public function getManage($manage){
        return $this->message = $manage;
    }

    public function show(){
        echo "<h1>这个是service</h1>";
    }

    public function update(){
        echo "这个是一个修改方法";
    }

    public function proUpdate(){
        echo "<p>要使用service中的方法 必须是 共有的方法</p>";
    }
}
