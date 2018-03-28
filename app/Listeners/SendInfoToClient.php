<?php

namespace App\Listeners;

use App\Events\PusherEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInfoToClient
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PusherEvent  $event
     * @return void
     */
    public function handle(PusherEvent $event)
    {
        $pusher = \Illuminate\Support\Facades\App::make('pusher');
        $order = $event->order;
        $pusher->trigger( 'my-channel',
            'my-event',
            ['text' => $order->orderNumber]
        );

    }
}
