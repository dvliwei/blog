<?php

namespace App\Http\Controllers;

use App\Events\Event;
use App\Events\OrderShipped;
use App\Events\PusherEvent;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderInfo($id){
        $order = Order::find($id);
        //触发监听事件
        Event(new OrderShipped($order));

        //触发监听推送事件
        Event(new PusherEvent($order));

        return view('home.order')->withPost($order);
    }
}
