<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::create([
            'title' => 'Fashion',
            'slug' => Str::slug('Fashion'),
            'color' => '#800080'
        ]);

        $categories = Category::create([
            'title' => 'Sains & Teknologi',
            'slug' => Str::slug('Sains & Teknologi'),
            'color' => '#000080'
        ]);
        
        $categories = Category::create([
            'title' => 'Olahraga',
            'slug' => Str::slug('Olahraga'),
            'color' => '#008080'
        ]);

        $categories = Category::create([
            'title' => 'Otomotif',
            'slug' => Str::slug('Otomotif'),
            'color' => '#008000'
        ]);

        $categories = Category::create([
            'title' => 'Properti',
            'slug' => Str::slug('Properti'),
            'color' => '#808000'
        ]);

        $categories = Category::create([
            'title' => 'Kesehatan',
            'slug' => Str::slug('Kesehatan'),
            'color' => '#800000'
        ]);

        $categories = Category::create([
            'title' => 'Akademi',
            'slug' => Str::slug('Akademi'),
            'color' => '#00FFFF'
        ]);

        $categories = Category::create([
            'title' => 'Media Sosial',
            'slug' => Str::slug('Media Sosial'),
            'color' => '#808080'
        ]);
    }
}
