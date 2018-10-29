<?php

namespace App\Http\Controllers;

use TokenManage;


class TokenManageController extends Controller
{
    public function index(){
        $res = TokenManage::getServeVersion();
        dd($res);
    }
}
