<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'title' => 'Bodyfit',
            'slug' => 'bodyfit'
        ]);
        Tag::create([
            'title' => 'Sexy',
            'slug' => 'sexy'
        ]);
        Tag::create([
            'title' => 'Perawatan Tubuh',
            'slug' => 'perawatan-tubuh'
        ]);
        Tag::create([
            'title' => 'Tubuh Sehat',
            'slug' => 'tubuh-sehat'
        ]);
        Tag::create([
            'title' => 'Kantor',
            'slug' => 'kantor'
        ]);
    }
}
