<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ObservingChatMessage extends Event implements  ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $_chat_message = '';
    public $_user_id = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chat_message, $user_id)
    {
        $this->_chat_message = $chat_message;
        $this->_user_id = $user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('global-chat-room');
    }
}
