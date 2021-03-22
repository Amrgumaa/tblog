<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),

        ]);
        App\User::create([
            'name' => 'Amr Salah',
            'email' => 'amrgumaa@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
