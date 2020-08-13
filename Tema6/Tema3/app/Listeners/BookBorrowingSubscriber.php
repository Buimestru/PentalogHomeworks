<?php

namespace App\Listeners;

use App\Admin;
use App\Book;
use App\Borrowing;
use App\Notification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookBorrowingSubscriber
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleBookBorrowing($event)
    {
        $user_email = User::whereId($event->user_id)->first()->email;
        $book_title = Book::whereId($event->book_id)->first()->title;

        $admins = Admin::get();

        foreach ($admins as $admin) {
            Notification::create([
                'message' => "The user with email $user_email borrowed the book '$book_title' with id $event->book_id at " . NOW(),
                'receiver_type' => 'admin',
                'receiver_email' => $admin->email
            ]);
        }

        Notification::create([
            'message' => "The book '$book_title' was added to your borrowings",
            'receiver_type' => 'user',
            'receiver_email' => $user_email
        ]);
    }

    public function handleBookReturn($event)
    {
        $borrowing = Borrowing::whereId($event->borrowing_id)->first();
        $user_email = User::whereId($borrowing->user_id)->first()->email;
        $book_title = Book::whereId($borrowing->book_id)->first()->title;

        Notification::create([
            'message' => "Your borrowed book '$book_title' was added to returned",
            'receiver_type' => 'user',
            'receiver_email' => $user_email
        ]);
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\BookBorrowingEvent',
            'App\Listeners\BookBorrowingSubscriber@handleBookBorrowing'
        );

        $events->listen(
            'App\Events\BookReturnEvent',
            'App\Listeners\BookBorrowingSubscriber@handleBookReturn'
        );
    }
}
