<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserstableSeeder::class);
        $this->call(TagstableSeeder::class);
        $this->call(CategoriestableSeeder::class);
        $this->call(ColorstableSeeder::class);

        factory(App\Post::class, 10)->create();
        $tags = App\Tag::all()->where('id', 1);
        App\Post::All()->each(function ($post) use ($tags) {
            $post->tags()->saveMany($tags);
        });
    }
}
