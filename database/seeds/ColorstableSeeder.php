<?php

use Illuminate\Database\Seeder;

class ColorstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Color::create([
            'name' => 'primary',
        ]);
        App\Color::create([
            'name' => 'secondary',
        ]);
        App\Color::create([
            'name' => 'danger',
        ]);
        App\Color::create([
            'name' => 'warning',
        ]);
        App\Color::create([
            'name' => 'light',
        ]);
        App\Color::create([
            'name' => 'dark',
        ]);
        App\Color::create([
            'name' => 'link',
        ]);
        App\Color::create([
            'name' => 'info',
        ]);
    }
}
