<?php

namespace Modules\Chat\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Chat\Entities\ChatUser;

class UserAdded implements ShouldBroadcast {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that signed-in.
     *
     * @var User
     */
    public $user;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatUser $user)
    {
        $this->user = $user;
    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat');
    }
}
