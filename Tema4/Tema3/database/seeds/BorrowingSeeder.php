<?php

use App\Borrowing;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrowings')->insert([
            [
                'user_id' => 1,
                'book_id' => 3,
                'borrowed_at' => date('2020-06-12'),
                'borrowed_until' => date('2020-07-03'),
                'returned_at' => date('2020-07-03'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 2,
                'book_id' => 6,
                'borrowed_at' => date('2020-06-23'),
                'borrowed_until' => date('2020-07-18'),
                'returned_at' => date('2020-07-16'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 3,
                'book_id' => 13,
                'borrowed_at' => date('2020-06-29'),
                'borrowed_until' => date('2020-07-21'),
                'returned_at' => date('2020-07-21'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 1,
                'book_id' => 10,
                'borrowed_at' => date('2020-07-03'),
                'borrowed_until' => date('2020-07-24'),
                'returned_at' => date('2020-07-24'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 6,
                'book_id' => 15,
                'borrowed_at' => date('2020-07-12'),
                'borrowed_until' => date('2020-08-03'),
                'returned_at' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 3,
                'book_id' => 7,
                'borrowed_at' => date('2020-07-21'),
                'borrowed_until' => date('2020-08-13'),
                'returned_at' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 4,
                'book_id' => 13,
                'borrowed_at' => date('2020-07-22'),
                'borrowed_until' => date('2020-08-16'),
                'returned_at' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => 5,
                'book_id' => 18,
                'borrowed_at' => date('2020-07-22'),
                'borrowed_until' => date('2020-08-16'),
                'returned_at' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
