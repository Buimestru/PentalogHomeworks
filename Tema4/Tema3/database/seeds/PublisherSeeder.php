<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            [
                'name' => 'Editura Litera',
                'status' => 'Inactive',
                'foundation_year' => '1965',
                'origin_country' => 'Romania',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Editura RAO',
                'status' => 'Active',
                'foundation_year' => '1985',
                'origin_country' => 'Romania',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Editura Adevarul',
                'status' => 'Active',
                'foundation_year' => '1973',
                'origin_country' => 'Romania',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Editura Minerva',
                'status' => 'Inactive',
                'foundation_year' => '1958',
                'origin_country' => 'Romania',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Editura ART',
                'status' => 'Active',
                'foundation_year' => '1991',
                'origin_country' => 'Romania',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Editura Lumina',
                'status' => 'Active',
                'foundation_year' => '1974',
                'origin_country' => 'Romania',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
