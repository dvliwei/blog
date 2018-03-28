<?php

namespace App\Events;


use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class TestEvent   implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //类型需为public
    public $msg;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return 'my-channel';
        return new PrivateChannel('my-channel',
                      'my-event',
                      ['text' => 'I Love China!!!']);
    }

    /**
     * 指定广播事件(对应前端的事件)
     * @return string
     */
    public function broadcastAs()
    {
        return 'my-event';
    }

    /**
     * 获取广播数据,默认是广播的public属性的数据
     */
    public function broadcastWith()
    {
        return ['info' => $this->msg];
    }

}
