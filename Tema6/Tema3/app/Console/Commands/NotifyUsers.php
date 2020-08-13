<?php

namespace App\Console\Commands;

use App\Notification;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify the user that he late to return the book';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::with('borrowedBooks')->lateReturns()->get();
        foreach($users as $user) {

            for($index = 0; $index < $user->borrowedBooks->count(); $index++) {
                $deadline_date = Carbon::createFromFormat('Y-m-d', $user->borrowedBooks[$index]->pivot->borrowed_until);
                $diffInDays = $deadline_date->diff(Carbon::now())->days;

                Notification::create([
                    'message' => "You late $diffInDays days for return the book " . $user->borrowedBooks[$index]->title,
                    'receiver_type' => 'user',
                    'receiver_email' => $user->email
                ]);
            }
        }
    }
}
