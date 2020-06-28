<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id' => '1',
            'image' => 'logo.png',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658'
        ]);

        Profile::create([
            'user_id' => '2',
            'image' => 'riyan.jpg',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658'
        ]);
    }
}
