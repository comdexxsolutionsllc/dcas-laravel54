<?php

namespace Modules\Chat\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ChatMessageWasReceived implements ShouldBroadcast {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatMessage;

    public $user;


    public function __construct($chatMessage, $user)
    {
        $this->chatMessage = $chatMessage;
        $this->user = $user;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('chat-room.1');
    }
}