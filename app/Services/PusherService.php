<?php

namespace App\Services;

use Pusher\Pusher;

class PusherService
{
    protected $pusher;

    public function __construct()
    {
        $this->pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            ['cluster' => env('PUSHER_APP_CLUSTER')]
        );
    }

    public function triggerNotification($channel, $event, $data)
    {
        $privateChannel = 'private-' . $channel;
        $this->pusher->trigger($privateChannel, $event, $data);
    }
}
