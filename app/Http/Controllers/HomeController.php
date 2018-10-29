<?php

namespace App\Http\Controllers;

use App\Models\User\Model\User;
use App\Repositories\LwRSA;
use Illuminate\Http\Request;
use CpsTplExample;
use Curl;
use Manage;
use Moloquent;
class HomeController extends Moloquent
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $getId = new  \getID3();
       dd($getId->analyze('/Applications/MAMP/htdocs/blog/storage/file/video.mp4'));


        $oCurl = curl_init();
        $header[] = "deo.com";
        $user_agent = "Mozilla/4.0 (Linux; Andro 6.0; Nexus 5 Build) AppleWeb/537.36 (KHTML, like Gecko)";
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($oCurl, CURLOPT_HEADER, true);
        curl_setopt($oCurl, CURLOPT_NOBODY, true);
        curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        // 不用 POST 方式请求, 意思就是通过 GET 请求
        curl_setopt($oCurl, CURLOPT_POST, false);
        $sContent = curl_exec($oCurl);
        // 获得响应结果里的：头大小
        $headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
        // 根据头大小去获取头信息内容
        $header = substr($sContent, 0, $headerSize);
        curl_close($oCurl);

        dd($header);
        exit;
        $this->loginFaceWeb();

//        $res = Manage::getManage('hi');
//        Manage::show();
//        Manage::update();
//        Manage::proUpdate();
//        exit;
        $url = 'https://www.facebook.com/ajax/pagelet/generic.php/ProfileTimelineSectionPagelet';
        $data = Curl::to($url)->withData(['data'=>'{"profile_id":100016678922029,"start":0,"end":1533106799,"query_type":36,"sk":"timeline","lst":"100018530234203:100016678922029:1532932033","buffer":250,"current_scrubber_key":"recent","page_index":5,"require_click":false,"section_container_id":"u_fetchstream_15_8","section_pagelet_id":"pagelet_timeline_recent","unit_container_id":"u_fetchstream_15_7","showing_esc":false,"tipld":{"sc":18,"vc":92},"num_visible_units":92,"remove_dupes":true,"pagelet_token":"AWsDFzFCWQBqUFib33dCmnPVB_WBWYze-CZumHHDXi9JuJwVunKwSdud1cswo_wjiS8"}','ajaxpipe_fetch_stream'=>1])->setCookieFile('/Applications/MAMP/htdocs/blog/doc/cookie')->get();

        return view('home');
    }

    protected function loginFaceWeb(){
        $email = 'php_wei_li@163.com';
        $password = 'liwei1987821';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/login.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'email='.urlencode($email).'&pass='.urlencode($password));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd ());
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd ());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "user_agent");
        curl_setopt($ch, CURLOPT_REFERER, "http://www.facebook.com");
        $fbMain = curl_exec($ch) or die(curl_error($ch));

        $url = 'https://www.facebook.com/fdf3000?fref=hovercard&hc_location=chat';
        curl_setopt($ch, CURLOPT_URL, $url);
        $demo_mac=curl_exec($ch);
        echo $demo_mac;
    }

    protected function loginFace(){
        $email = 'php_wei_li@163.com';
        $password = 'liwei1987821';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/login.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'charset_test=&email='.urlencode($email).'&pass='.urlencode($password).'&login=Login');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Charset: utf-8','Accept-Language: en-us,en;q=0.7,bn-bd;q=0.3','Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5'));
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd ());
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd ());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "user_agent");
        curl_setopt($ch, CURLOPT_REFERER, "http://m.facebook.com");
        $fbMain = curl_exec($ch) or die(curl_error($ch));

        $url = 'https://m.facebook.com/fdf3000?fref=hovercard&hc_location=chat';
        curl_setopt($ch, CURLOPT_URL, $url);
        $demo_mac=curl_exec($ch);
        echo $demo_mac;

    }


    public function mongo(){

        $limit  = User::all();
        dd($limit);
    }
}
