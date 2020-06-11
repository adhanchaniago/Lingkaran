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
            'name' => 'Fashion',
            'slug' => Str::slug('Fashion')
        ]);

        $categories = Category::create([
            'name' => 'Sains & Teknologi',
            'slug' => Str::slug('Sains & Teknologi')
        ]);
        
        $categories = Category::create([
            'name' => 'Olah Raga',
            'slug' => Str::slug('Olah Raga')
        ]);

        $categories = Category::create([
            'name' => 'Otomotif',
            'slug' => Str::slug('Otomotif')
        ]);

        $categories = Category::create([
            'name' => 'Properti',
            'slug' => Str::slug('Properti')
        ]);

        $categories = Category::create([
            'name' => 'Kesehatan',
            'slug' => Str::slug('Kesehatan')
        ]);

        $categories = Category::create([
            'name' => 'Akademi',
            'slug' => Str::slug('Akademi')
        ]);

        $categories = Category::create([
            'name' => 'Media Social',
            'slug' => Str::slug('Media Social')
        ]);
    }
}
