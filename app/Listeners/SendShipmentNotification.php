<?php

/**
 * 定义监听器
 */
namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

class SendShipmentNotification
{
    protected $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {

        $order = $event->order;//使用 $event->order 访问订单...
        if(!$this->hasViewedOrder($order)){
            $order->lookCount +=1;

            $order->save();

            $this->storeViewedOrder($order);
        }
    }

    protected function hasViewedOrder($order)
    {

        return $this->getViewedOrder($order);
    }

    protected function getViewedOrder($order)
    {
        $key = 'viewed_order.'.$order->id;

        return $this->session->get($key);
    }

    protected function storeViewedOrder($order)
    {
        $key = 'viewed_order.'.$order->id;
        $this->session->put($key, time());
        $this->session->save();//使用save()才可以将session保存起来
    }

}
