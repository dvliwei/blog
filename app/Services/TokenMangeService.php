<?php
/**
 * 而业务逻辑应该放到 services 这种目录之下
 * Token 管理服务
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/5/15
 * Time: 下午2:28
 */
namespace App\Services;

class  TokenMangeService{
    public $token;

    public function getToken($token){
        return $this->token = $token;
    }

    public function getServeVersion(){
        return '7.8.1';
    }
}