<?php

namespace App\Repositories\LivePlay;

use App\Repositories\BaseRepository;
use Curl;

class LiveNetTvRepository extends BaseRepository
{

    protected  $channels;
    protected  $nettvs;
    protected  $stream_urls;
    protected  $bein_sports;
    protected  $checkChannels;
    protected  $duckChannels;
    protected  $widestream;
    /**
     * 需要解析的频道集合 以及token获取地址
     *
     * LiveNetTvRepository constructor.
     */
    public function __construct()
    {
        $this->channels =[
            'bein_1_france'=>'http://185.21.217.29:9100/ape/bein1fr/',
            'bein_2_france'=>'http://185.21.217.29:9100/ape/bein2fr/',
            'bein_3_france'=>'http://185.21.217.29:9100/ape/bein3fr/',
            'bein_1_max'=>'http://185.21.217.9:8554/seven/few/bein1maxtr/',
            'bein_2_max'=>'http://185.21.217.9:8554/seven/few/2maxtr/',
            'bein_3_turkey'=>'http://185.21.216.156:8554/nine/mix/bein3tr/',
            'bein_1_turkey'=>'http://185.21.216.156:8554/nine/mix/bein1tr/',
            'bein_2_turkey'=>'http://185.21.216.156:8554/nine/mix/bein2tr/',
            'bein_4_turkey'=>'http://185.21.216.156:8554/nine/mix/bein4tr/',

            'bein_1_sports'=>['http://185.21.216.183:8554/4abbit/bein1sd/','http://185.21.216.186:8554/live/bs1/'],
            'bein_2_sports'=>'http://185.21.216.167:8554/fox/bein2/',
            'bein_3_sports'=>'http://185.21.216.167:8554/fox/bein3/',
            'bein_4_sports'=>'http://185.21.216.167:8554/fox/bein4/',
            'bein_5_sports'=>'http://185.21.216.167:8554/fox/bein5/',
            'bein_6_sports'=>['http://185.21.216.167:8554/fox/bein6/','http://185.21.216.183:8554/4abbit/bein6sd/'],
            'bein_7_sports'=>'http://185.21.216.167:8554/fox/bein7/',
            'bein_8_sports'=>['http://185.21.216.167:8554/fox/bein8/','http://185.21.216.183:8554/4abbit/bein8sd/'],
            'bein_9_sports'=>['http://185.21.216.167:8554/fox/bein9/','http://185.21.216.183:8554/4abbit/bein9sd/'],
            'bein_10_sports'=>['http://185.21.216.167:8554/fox/bein10/','http://185.21.216.183:8554/4abbit/bein10sd/'],
            'bein_11_sports'=>'http://185.21.217.13:8554/help/bein11/',
        ];
        $this->checkChannels=[
            'bein_1_max'=>'http://185.21.217.9:8554/seven/few/bein1maxtr/',
            'bein_2_max'=>'http://185.21.217.9:8554/seven/few/2maxtr/',
        ];

        $this->duckChannels=[
            'bein_3_turkey'=>'http://185.21.216.156:8554/nine/mix/bein3tr/',
            'bein_1_turkey'=>'http://185.21.216.156:8554/nine/mix/bein1tr/',
            'bein_2_turkey'=>'http://185.21.216.156:8554/nine/mix/bein2tr/',
            'bein_4_turkey'=>'http://185.21.216.156:8554/nine/mix/bein4tr/',
        ];

        $this->avesChannels=[
            'bein_1_sports'=>'http://185.21.216.183:8554/4abbit/bein1sd/',
            'bein_2_sports'=>'http://185.21.216.183:8554/4abbit/bein2sd/',
            'bein_3_sports'=>'http://185.21.216.183:8554/4abbit/bein3sd/',
            'bein_4_sports'=>'http://185.21.216.183:8554/4abbit/bein4sd/',
            'bein_5_sports'=>'http://185.21.216.183:8554/4abbit/bein5sd/',
            'bein_6_sports'=>'http://185.21.216.183:8554/4abbit/bein6sd/',
            'bein_7_sports'=>'http://185.21.216.183:8554/4abbit/bein7sd/',
            'bein_8_sports'=>'http://185.21.216.183:8554/4abbit/bein8sd/',
            'bein_9_sports'=>'http://185.21.216.183:8554/4abbit/bein9sd/',
            'bein_10_sports'=>'http://185.21.216.183:8554/4abbit/bein10sd/',
            'bein_11_sports'=>'http://185.21.216.183:8554/4abbit/bein11sd/',
            'bein_12_sports'=>'http://185.21.216.183:8554/4abbit/bein12sd/',
        ];

        $this->bein_sports = 'http://www.linenettv.net:8090/data/(~)/fd.nettv/';


        $this->nettvs = [
            'aves'=>'http://212.83.158.140:6060/aves.nettv/',
            'all'=>'http://212.83.158.140:6060/all.nettv/',
            'duck'=>'http://78.129.139.44:3030/duck.nettv/',
            'chick'=>'http://212.83.182.86:8080/chick.nettv/',
            'def'=>'http://212.47.237.131:8090/temp/def.php'
        ];


        //网页源码中存在播放地址
        $this->widestream = [
            'bein_1_sports'=>'http://widestream.io/embed-21947',
            'bein_2_sports'=>'http://widestream.io/embed-21948',
            'bein_3_sports'=>'http://widestream.io/embed-21949',
            'bein_4_sports'=>'http://widestream.io/embed-21950',
            'bein_5_sports'=>'http://widestream.io/embed-21951',
            'bein_6_sports'=>'http://widestream.io/embed-21952',
            'bein_7_sports'=>'http://widestream.io/embed-21953',
            'bein_8_sports'=>'http://widestream.io/embed-21954',
            'bein_9_sports'=>'http://widestream.io/embed-21955',
        ];

        $this->stream_urls=['livenettv~live~bs1','livenettv~live~bs2','livenettv~live~bs3',
            'livenettv~live~bsn',
            'livenettv~live~beinspusa','livenettv~live~bs10','livenettv~live~bs11','livenettv~live~bs12'];
    }

    public function extractForScript($webUrl=NULL)
    {


        foreach ($this->nettvs as $key =>$nettv){

            if($key=='aves'){
                $wmsAuthSign = $this->getSignWithAves($nettv);
                foreach ($this->avesChannels as $key=>$channel){
                    $m3u8Url = $channel.'playlist.m3u8?wmsAuthSign='.$wmsAuthSign;
                    echo ($m3u8Url) ."\n";
                }
            }
            exit;

            if($key=='duck'){
                $wmsAuthSign = $this->getSignWithDuck($nettv);
                foreach ($this->duckChannels as $key=>$channel){
                    $m3u8Url = $channel.'playlist.m3u8?wmsAuthSign='.$wmsAuthSign;
                    echo ($m3u8Url) ."\n";
                }
            }


            if($key=='chick'){
                $wmsAuthSign = $this->getSignWithChick($nettv);
                foreach ($this->checkChannels as $key=>$channel){
                    $m3u8Url = $channel.'playlist.m3u8?wmsAuthSign='.$wmsAuthSign;
                    echo ($m3u8Url) ."\n";
                }
            }


            if($key=='all'){
                $wmsAuthSign = $this->getSign($nettv);
                foreach ($this->stream_urls as $stream_url){
                    $m3u8Url = $this->beinSportsScriptLink1($stream_url, $wmsAuthSign);
                    echo ($m3u8Url) ."\n";
                }
                exit;
            }

        }
    }


    protected function getSignWithAves($nettv){
        $getData=[];
        $html = Curl::to($nettv)->withData( $getData)
            ->withHeader("User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36")
            ->withHeader("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8")
            ->withHeader("Accept-Language: zh,en;q=0.9,ar;q=0.8,zh-CN;q=0.7,ja;q=0.6,zh-TW;q=0.5")
            ->withHeader("Cache-Control: max-age=0")
            ->withHeader("Host: 212.83.182.86:8080")
            ->withHeader("Proxy-Connection: keep-alive")
            ->withHeader("Upgrade-Insecure-Requests: 1")
            ->get();
        $str = str_replace('?wmsAuthSign=','',$html);
        $key1 = substr($str,0,87);
        $key2 = substr($str,88,7);
        $key3 = substr($str,96,1);
        $key4 = substr($str,99,17);
        $key = $key1.$key2.$key3.$key4;
        return $key;
    }

    protected function getSignWithDuck($nettv){

        $getData=[];
        $html = Curl::to($nettv)->withData( $getData)
            ->withHeader("User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36")
            ->withHeader("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8")
            ->withHeader("Accept-Language: zh,en;q=0.9,ar;q=0.8,zh-CN;q=0.7,ja;q=0.6,zh-TW;q=0.5")
            ->withHeader("Cache-Control: max-age=0")
            ->withHeader("Host: 212.83.182.86:8080")
            ->withHeader("Proxy-Connection: keep-alive")
            ->withHeader("Upgrade-Insecure-Requests: 1")
            ->get();
        $str = str_replace('?wmsAuthSign=','',$html);
        $key1 = substr($str,0,60);
        $key2 = substr($str,61,5);
        $key3 = substr($str,67,7);
        $key4 = substr($str,75,7);
        $key5 = substr($str,83,33);
        $key = $key1.$key2.$key3.$key4.$key5;
        return $key;
    }

    protected function getSignWithChick($nettv){
        $getData=[];
        $html = Curl::to($nettv)->withData( $getData)
            ->withHeader("User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36")
            ->withHeader("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8")
            ->withHeader("Accept-Language: zh,en;q=0.9,ar;q=0.8,zh-CN;q=0.7,ja;q=0.6,zh-TW;q=0.5")
            ->withHeader("Cache-Control: max-age=0")
            ->withHeader("Host: 212.83.182.86:8080")
            ->withHeader("Proxy-Connection: keep-alive")
            ->withHeader("Upgrade-Insecure-Requests: 1")
            ->get();
        $str = str_replace('?wmsAuthSign=','',$html);
        $key1 = substr($str,0,88);
        $key2 = substr($str,89,6);
        $key3 = substr($str,96,1);
        $key4 = substr($str,99,17);
        $key = $key1.$key2.$key3.$key4;
        return $key;
    }
    /**
     * 默认的频道解析 link1
     * @param $param
     * @param $wmsAuthSign
     * @return mixed
     */
    protected function beinSportsScriptLink1($param,$wmsAuthSign){
        $data = '{"stream_url":"'.$param.'","token":32,"response_body":"'.$wmsAuthSign.'"}';
        $postData=["data"=>$data];
        $url = 'http://www.linenettv.net:8090/data/(~)/fd.nettv/';
        $html = Curl::to($url)->withData( $postData)->post();
        $data = json_decode($html);
        return $data->stream_url;

    }

    protected function getPlayWithIp(){

    }


    protected function getSign($url){
        $getData=[];
        $html = Curl::to($url)->withData( $getData)
                ->withHeader("User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36")
                ->withHeader("Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8")
                //->withHeader("Accept-Encoding:gzip, deflate")
                ->withHeader("Accept-Language:zh,en;q=0.9,ar;q=0.8,zh-CN;q=0.7,ja;q=0.6,zh-TW;q=0.5")
                //->withHeader("Host:212.83.158.140:6060")
                ->withHeader("Proxy-Connection:keep-alive")
                ->withHeader("Upgrade-Insecure-Requests:1")
                ->withHeader("Cache-Control:max-age=0")
                ->get();
        return (string)$html;
    }


}
