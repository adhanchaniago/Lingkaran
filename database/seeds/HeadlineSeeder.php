<?php

use Illuminate\Database\Seeder;
use App\Headline;

class HeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Headline::create([
            'post_id' => 13,
            'type' => 'main'
        ]);
        Headline::create([
            'post_id' => 6,
            'type' => 'secondary'
        ]);
        Headline::create([
            'post_id' => 8,
            'type' => 'secondary'
        ]);
        Headline::create([
            'post_id' => 12,
            'type' => 'secondary'
        ]);
        Headline::create([
            'post_id' => 11,
            'type' => 'secondary'
        ]);
    }
}
