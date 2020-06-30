<?php

use App\User;
use Illuminate\Database\Seeder;
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
        $user = User::create([
            'firstname' => 'Amanda',
            'lastname' => 'Nasution',
            'email' => 'superadmin@email.com',
            'password' => Hash::make('12345678'),
            'status' => 1
        ]);
        $user->assignRole('Administrator');

        $user = User::create([
            'firstname' => 'Riyan',
            'lastname' => 'Amanda',
            'email' => 'ryant.n92@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => 0
        ]);
        $user->assignRole('Reporter');
    }
}
