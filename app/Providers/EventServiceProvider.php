<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
            'App\Listeners\MyListerner1',
            'App\Listeners\MyListerner2',
        ],
        'App\Events\BlogView' => [
            'App\Listeners\BlogViewListener',
        ],
        //。下面让我们添加一个 OrderShipped 事件：
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
        ],

        'App\Events\PusherEvent' => [
            'App\Listeners\SendInfoToClient',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
