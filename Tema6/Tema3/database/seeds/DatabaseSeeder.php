<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            PublisherSeeder::class,
            BookSeeder::class,
            UserSeeder::class,
            BorrowingSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
