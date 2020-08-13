<?php

namespace App\Events;

use App\Borrowing;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookBorrowingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $book_id;

    /**
     * Create a new event instance.
     *
     * @param int $user_id
     * @param int $book_id
     */
    public function __construct(int $user_id, int $book_id)
    {
        $this->user_id = $user_id;
        $this->book_id = $book_id;
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
