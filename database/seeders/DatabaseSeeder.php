<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Panggil seeder baru yang Anda buat
        $this->call(ProdiesSeeder::class);
        $this->call(UserSeeder::class);
        Post::factory(20)->create();
    }
}
