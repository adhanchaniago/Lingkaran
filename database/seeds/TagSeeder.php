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
            'title' => 'Punk',
            'slug' => 'punk'
        ]);
        Tag::create([
            'title' => 'Stress',
            'slug' => 'stress'
        ]);
        Tag::create([
            'title' => 'IRT',
            'slug' => 'irt'
        ]);
        Tag::create([
            'title' => 'Gaya Hidup',
            'slug' => 'gaya-hidup'
        ]);
        Tag::create([
            'title' => 'Natural',
            'slug' => 'natural'
        ]);
        Tag::create([
            'title' => 'Corona',
            'slug' => 'corona'
        ]);
        Tag::create([
            'title' => 'Penyakit Dalam',
            'slug' => 'penyakit-dalam'
        ]);
        Tag::create([
            'title' => 'Hidup Sehat',
            'slug' => 'hidup-sehat'
        ]);
        Tag::create([
            'title' => 'Motor',
            'slug' => 'motor'
        ]);
        Tag::create([
            'title' => 'Mobil',
            'slug' => 'mobil'
        ]);
        Tag::create([
            'title' => 'Kendaraan',
            'slug' => 'kendaraan'
        ]);
        Tag::create([
            'title' => 'Berita',
            'slug' => 'berita'
        ]);
        Tag::create([
            'title' => 'Internasional',
            'slug' => 'internasional'
        ]);
        Tag::create([
            'title' => 'Mekanik',
            'slug' => 'mekanik'
        ]);
        Tag::create([
            'title' => 'Rumah',
            'slug' => 'rumah'
        ]);
        Tag::create([
            'title' => 'Desain',
            'slug' => 'desain'
        ]);
        Tag::create([
            'title' => 'Media',
            'slug' => 'media'
        ]);
        Tag::create([
            'title' => 'Masyarakat',
            'slug' => 'masyarakat'
        ]);
    }
}
