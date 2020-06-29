<?php

use App\Profile;
use Carbon\Carbon;
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
            'birth' => Carbon::now(),
            'gender' => 'Male',
            'religion' => 'Islam',
            'status' => 'Single',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Asal ada kemauan semua pasti bisa'
        ]);

        Profile::create([
            'user_id' => '2',
            'image' => 'riyan.jpg',
            'birth' => Carbon::now(),
            'gender' => 'Male',
            'religion' => 'Islam',
            'status' => 'Single',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Asal ada kemauan semua pasti bisa'
        ]);
    }
}
