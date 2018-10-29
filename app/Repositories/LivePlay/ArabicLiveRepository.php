<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/7/13
 * Time: 下午5:12
 */
namespace App\Repositories\LivePlay;
use App\Repositories\BaseRepository;
use Curl;
class ArabicLiveRepository  extends  BaseRepository{

    protected $appChannel;
    protected $token;
    public function __construct()
    {
        $this->appChannel ='http://www.livesportsking.com/catalogue/api/ArabicTvAndro?action=categories';
        $this->token = 'RHE1OVlqUE9FY0Y3R3lLUTJLWWh1VEVkbnp0MU9wU2E=';

    }


    public function extractForScript($webUrl=null)
    {
        $postData = ['token'=>$this->token];
        $data = Curl::to($this->appChannel)->withData($postData)->withHeader("Content-Type:application/x-www-form-urlencoded")->post();
        $data = json_decode($data);
        $result = [];
        foreach ($data->categories as $row){
            $channel = new \stdClass();
            $channel->Main_Cat_name = $row->Main_Cat_name;
            $channel->thumbnail = $row->thumbnail;
            $listUrl = "http://www.livesportsking.com/catalogue/api/ArabicTvAndro?action=inlinks&catid={$row->id}&subcatid=0&maincatid=0";
            $channel->apiUrl = $listUrl;
            $items = Curl::to($listUrl)->withData($postData)->withHeader("Content-Type:application/x-www-form-urlencoded")->post();
            $items = json_decode($items);
            $channel->list  = $items;
            $result[] = $channel;
        }

        return $result;
    }
}