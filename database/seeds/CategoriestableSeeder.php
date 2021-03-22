<?php

use Illuminate\Database\Seeder;

class CategoriestableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name' => 'cat 1',
            'slug' => 'cat-1',
            'description' => 'catd1',
            'color_id' => '1',
        ]);
        App\Category::create([
            'name' => 'cat 2',
            'slug' => 'cat-2',
            'description' => 'catd2',
            'color_id' => '4',
        ]);
        App\Category::create([
            'name' => 'cat 3',
            'slug' => 'cat-3',
            'description' => 'cat3',
            'color_id' => '8',
        ]);
    }
}
