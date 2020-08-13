<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ion Ionescu',
                'email' => 'ionionescu@gmail.com',
                'address' => 'Str. F Bl. S Sc. A Ap. 3, Iasi',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Vasile Vasilescu',
                'email' => 'vasilevasilescu@gmail.com',
                'address' => 'Str. S Bl. A Sc. B Ap. 4, Iasi',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Petru Petrescu',
                'email' => 'petrupetrescu@gmail.com',
                'address' => 'Str. P Bl. E Sc. A Ap. 23, Iasi',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Ion Doe',
                'email' => 'iondoe@gmail.com',
                'address' => 'Str. G Bl. Q Sc. C Ap. 12, Iasi',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Vasile Ionescu',
                'email' => 'vasileionescu@gmail.com',
                'address' => 'Str. F Bl. S Sc. A Ap. 3, Iasi',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Ion Vasilescu',
                'email' => 'ionvasilescu@gmail.com',
                'address' => 'Str. S Bl. A Sc. B Ap. 4, Iasi',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],

        ]);
    }
}
