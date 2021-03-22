<?php

use Illuminate\Database\Seeder;


class TagstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tag::create([
            'name' => 'tag 1',
            'slug' => 'tag-1',
            'description' => 'tagd1',
        ]);
        App\Tag::create([
            'name' => 'tag 2',
            'slug' => 'tag-2',
            'description' => 'tagd2',
        ]);
    }
}
