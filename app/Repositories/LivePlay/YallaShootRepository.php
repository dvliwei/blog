<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/7/12
 * Time: 上午10:36
 */
namespace App\Repositories\LivePlay;

use App\Repositories\BaseRepository;
use Curl;
class YallaShootRepository extends  BaseRepository {

    public function __construct()
    {
        parent::__construct();
    }


    public function extractForScript($webUrl)
    {
        $getData = [];
        $html = Curl::to($webUrl)->withData( $getData)->get();
        $reg = '|var idsem = \{"\d+":"([^"]+)|';
        if(preg_match($reg , $html,$matches)){
            $str = $matches[1];
            $html = base64_decode($str);
            $reg = '|src="([^"]+)|';
            if(preg_match($reg , $html, $matches)){
                $src = $matches[1];
                $html = Curl::to($src)->withData( $getData)->get();
                if($html && preg_match('|file: \'([^\']+)|',$html, $matches)){
                    $playUrl = $matches[1];
                    return $playUrl;
                }
            }
        }


    }
}