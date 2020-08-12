<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'name' => 'Agatha Christie',
                'nationality' => 'English',
                'born_date' => date('1890-09-15'),
                'born_country' => 'England',
                'death_date' => date('1976-01-12'),
                'death_country' => 'England',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Rudyard Kipling',
                'nationality' => 'British',
                'born_date' => date('1865-12-30'),
                'born_country' => 'British India',
                'death_date' => date('1936-01-18'),
                'death_country' => 'England',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Jack London',
                'nationality' => 'American',
                'born_date' => date(' 1876-01-12'),
                'born_country' => 'U.S.',
                'death_date' => date('1916-11-22'),
                'death_country' => 'U.S.',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Aldous Huxley',
                'nationality' => 'English',
                'born_date' => date(' 1894-07-26'),
                'born_country' => 'England',
                'death_date' => date('1963-11-22'),
                'death_country' => 'U.S.',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'George Orwell',
                'nationality' => 'English',
                'born_date' => date(' 1903-06-25'),
                'born_country' => 'British India',
                'death_date' => date('1950-01-21'),
                'death_country' => 'England',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Fyodor Dostoevsky',
                'nationality' => 'Russian',
                'born_date' => date(' 1821-11-11'),
                'born_country' => 'Russian Empire',
                'death_date' => date('1881-02-09'),
                'death_country' => 'Russian Empire',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Dan Brown',
                'nationality' => 'American',
                'born_date' => date(' 1964-06-22'),
                'born_country' => 'U.S.',
                'death_date' => null,
                'death_country' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
