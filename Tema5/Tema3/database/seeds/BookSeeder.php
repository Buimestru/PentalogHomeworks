<?php

use App\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Crima in trei acte',
                'author_id' => 1,
                'publisher_id' => 3,
                'publish_year' => '2005',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Zece negri mititei',
                'author_id' => 1,
                'publisher_id' => 2,
                'publish_year' => '2001',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Prima carte a junglei',
                'author_id' => 2,
                'publisher_id' => 6,
                'publish_year' => '2001',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'A doua carte a junglei',
                'author_id' => 2,
                'publisher_id' => 6,
                'publish_year' => '2002',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Martin Eden',
                'author_id' => 3,
                'publisher_id' => 3,
                'publish_year' => '2006',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Chemarea strabunilor',
                'author_id' => 3,
                'publisher_id' => 1,
                'publish_year' => '2002',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Colt alb',
                'author_id' => 3,
                'publisher_id' => 5,
                'publish_year' => '2005',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Dupa Inmormantare',
                'author_id' => 1,
                'publisher_id' => 2,
                'publish_year' => '2009',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Crima din Orient Express',
                'author_id' => 1,
                'publisher_id' => 4,
                'publish_year' => '2006',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Minunata lume noua',
                'author_id' => 4,
                'publisher_id' => 3,
                'publish_year' => '2005',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Reintoarcerea in minunata lume noua',
                'author_id' => 4,
                'publisher_id' => 3,
                'publish_year' => '2007',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'O mie noua sute optzeci si patru',
                'author_id' => 5,
                'publisher_id' => 1,
                'publish_year' => '2002',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Ferma animalelor',
                'author_id' => 5,
                'publisher_id' => 1,
                'publish_year' => '2001',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'O supradoza de moarte',
                'author_id' => 1,
                'publisher_id' => 3,
                'publish_year' => '2010',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Cu cartile pe fata',
                'author_id' => 1,
                'publisher_id' => 3,
                'publish_year' => '2004',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Idiotul',
                'author_id' => 6,
                'publisher_id' => 6,
                'publish_year' => '2001',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Crima si pedeapsa',
                'author_id' => 6,
                'publisher_id' => 2,
                'publish_year' => '2001',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Codul lui Da Vinci',
                'author_id' => 7,
                'publisher_id' => 4,
                'publish_year' => '2014',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Inferno',
                'author_id' => 7,
                'publisher_id' => 4,
                'publish_year' => '2016',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Origini',
                'author_id' => 7,
                'publisher_id' => 4,
                'publish_year' => '2018',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
