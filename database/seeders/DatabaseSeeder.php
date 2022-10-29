<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@rsbungabangsa.com',
            'role' => 'admin',
        ]);

        \App\Models\User::factory(100)->create();


    }
}
