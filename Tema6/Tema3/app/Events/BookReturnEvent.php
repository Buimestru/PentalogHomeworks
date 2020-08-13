<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookReturnEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $borrowing_id;

    /**
     * Create a new event instance.
     *
     * @param int $borrowing_id
     */
    public function __construct(int $borrowing_id)
    {
        $this->borrowing_id = $borrowing_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
