<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Main Admin',
                'email' => 'mainadmin@gmail.com',
                'password' => Hash::make('qwerty'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],

            [
                'name' => 'Secondary Admin',
                'email' => 'secondaryadmin@gmail.com',
                'password' => Hash::make('qwerty'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ]);
    }
}
