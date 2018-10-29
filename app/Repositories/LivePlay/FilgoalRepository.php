<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/7/12
 * Time: 上午11:29
 */

namespace App\Repositories\LivePlay;

use App\Repositories\BaseRepository;
use Curl;
class FilgoalRepository extends  BaseRepository {

    public function extractForScript($webUrl)
    {
        $getData = [];
        $html = Curl::to($webUrl)->withData( $getData)->get();
        $reg = '|data-file="([^"]+)|';
        if(preg_match($reg , $html, $matches)){
            $url = $matches[1].'/Video.xml';
            $html = Curl::to($url)->withData( $getData)->get();
            $data = simplexml_load_string($html);
            $result = [];
            foreach ($data->Files->File as $file){
                $item = new \stdClass();
                $item->Format =(string)$file->Format;
                $item->Width = (string)$file->Width;
                $item->Height = (string)$file->Height;
                $item->Path = 'https://video.vmp.mezzoz.com/'.(string)$file->Path;
                $result[] = $item;
            }
            return $result;
        }
    }
}