<?php

namespace App\Console\Commands;

use App\Book;
use App\User;
use Illuminate\Console\Command;

class GiveLateReturns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'give:LateReturns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give the users which late to return the books';

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
        $users = User::lateReturns()->pluck('name', 'email');
        dd($users);
        return 0;
    }
}
