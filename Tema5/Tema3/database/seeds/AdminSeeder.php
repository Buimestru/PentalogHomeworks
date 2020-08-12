<?php

use App\Admin;
use Illuminate\Database\Seeder;
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
        return Admin::create([
            'name' => 'TestAdmin',
            'email' => 'testadmin@gmail.com',
            'password' => Hash::make('qwerty')
        ]);
    }
}
