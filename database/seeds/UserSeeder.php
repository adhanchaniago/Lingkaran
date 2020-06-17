<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Lingkaran',
            'email' => 'superadmin@email.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
