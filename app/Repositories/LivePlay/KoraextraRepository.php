<?php

namespace App\Repositories\LivePlay;

use App\Repositories\BaseRepository;
use Curl;

class KoraextraRepository extends BaseRepository
{

    public function extractForScript($webUrl)
    {
        $getData = [];
        $html = Curl::to($webUrl)->withData( $getData)->get();
        $reg= '|var links = (\[[^\]]+)|';
        $result = [];
        if(preg_match($reg, $html, $macthes)){
            $datas = json_decode($macthes[1].']');

            foreach ($datas as $data){
                if((int)$data->platform==2){//2表示直播流
                    $url = (string)$data->url;
                    $reg = '|src="([^"]+)|';
                    if(preg_match($reg , $url , $matches)){
                        $item = new \stdClass();
                        $item->url = $matches[1];
                        $result[] = $item;
                    }
                }
            }
        }
        return $result;
    }
}
