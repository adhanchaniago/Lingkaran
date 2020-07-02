<?php


use App\Models\User;
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
        $user->profiles()->create([
            'user_id' => '1',
            'image' => 'amanda-nasution.jpg',
            'birth' => '1992-09-01',
            'gender' => 'Female',
            'religion' => 'Islam',
            'status' => 'Divorce',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Salah satu hal terbaik dalam hidup adalah melihat senyum di wajah orang tuamu, dan menyadari bahwa kamulah alasannya.'
        ]);
        $user->assignRole('Administrator');


        $user = User::create([
            'firstname' => 'Riyan',
            'lastname' => 'Amanda',
            'email' => 'ryant.n92@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => 1
        ]);
        $user->profiles()->create([
            'user_id' => '2',
            'image' => 'riyan-amanda.jpg',
            'birth' => '1992-09-01',
            'gender' => 'Male',
            'religion' => 'Islam',
            'status' => 'Single',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Untuk setiap manusia di dunia ini, Tuhan telah memberikan sesuatu yang mulia dan baik ke dalam hatinya. Selalu jaga hatimu.'
        ]);
        $user->assignRole('Reporter');

        $user = User::create([
            'firstname' => 'Vio',
            'lastname' => 'Amanda',
            'email' => 'vio.m@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => 1
        ]);
        $user->profiles()->create([
            'user_id' => '2',
            'image' => 'vio-amanda.jpg',
            'birth' => '1992-09-01',
            'gender' => 'Female',
            'religion' => 'Islam',
            'status' => 'Single',
            'address' => 'Jl. bumi, no.123,Palembang',
            'phone' => '087819216658',
            'about' => 'Untuk setiap manusia di dunia ini, Tuhan telah memberikan sesuatu yang mulia dan baik ke dalam hatinya. Selalu jaga hatimu.'
        ]);
        $user->assignRole('Editor');
    }
}
