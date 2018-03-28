<?php

/*
 * This file is part of Laravel Pusher.
 *
 * (c) Pusher, Ltd (https://pusher.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Pusher Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'auth_key' => '007db6a6ef080e4694fb',
            'secret' => '5fac871a97fb5e8f3b0b',
            'app_id' => '495590',
            'options' => [
                'cluster'=>'ap1',
                'encrypted' => true
            ],
            'host' => null,
            'port' => null,
            'timeout' => null,
        ],

        'alternative' => [
            'auth_key' => '007db6a6ef080e4694fb',
            'secret' => '5fac871a97fb5e8f3b0b',
            'app_id' => '495590',
            'options' => [
                'cluster'=>'ap1',
                'encrypted' => true
            ],
            'host' => null,
            'port' => null,
            'timeout' => null,
        ],

    ],

];
