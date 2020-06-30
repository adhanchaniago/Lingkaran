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
            'image' => 'p1.jpg',
            'birth' => '1992-09-01',
            'gender' => 'Female',
            'religion' => 'Islam',
            'status' => 'Divorce',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Salah satu hal terbaik dalam hidup adalah melihat senyum di wajah orang tuamu, dan menyadari bahwa kamulah alasannya.'
        ]);

        Profile::create([
            'user_id' => '2',
            'image' => 'p2.jpg',
            'birth' => '1992-09-01',
            'gender' => 'Male',
            'religion' => 'Islam',
            'status' => 'Single',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Untuk setiap manusia di dunia ini, Tuhan telah memberikan sesuatu yang mulia dan baik ke dalam hatinya. Selalu jaga hatimu.'
        ]);
    }
}
