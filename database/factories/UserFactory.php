<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// Category factory
$factory->define(Category::class, function (Faker $faker) {
    return [

        'name' => $faker->name(),
        'slug' => $faker->slug(),
        'description' => $faker->text(),
    ];
});
// Tag factory
$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'slug' => $faker->slug(),
        'description' => $faker->text(),
    ];
});
// Post factory
$factory->define(Post::class, function (Faker $faker) {
    $post = Post::all();
    $id = rand(30, 300);
    $tags = App\Tag::all();

    $image =  "https://picsum.photos/id/" . $id . "/640/480.jpg";

    return [
        'title' => $faker->sentence(),
        'slug' => Str::slug($faker->sentence()),
        // 'image' => $faker->image('storage/posts' . '/' . '$post->id', 200, 300, null, false),
        'image' => $image,
        'description' => $faker->text(400),
        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        },

    ];
});
