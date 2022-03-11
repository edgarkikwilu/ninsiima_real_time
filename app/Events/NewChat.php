<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $from;
    public $message;
    public $image;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($from,$message,$image)
    {
        $this->from = $from;
        $this->message = $message;
        $this->image = $image;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat-channel');
    }

    public function broadcastAs()
    {
        return 'new-chat';
    }

    public function broadcastWith()
    {
        return [
            'from'=>$this->from,
            'message'=>$this->message,
            'image'=>$this->image
        ];
    }
}
