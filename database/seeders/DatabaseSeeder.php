<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
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

        PostCategory::create([
            'name' => 'Ormawa',
            'slug' => 'ormawa',
            'body' => 'Artikel seputar kegiatan organisasi mahasiswa STMIK Rosma',
            'user_id'   => 1
        ]);

        PostCategory::create([
            'name' => 'Sosialisasi',
            'slug' => 'sosialisasi',
            'body' => 'Artikel tentang kegiatan sosialisasi STMIK Rosma',
            'user_id'   => 1
        ]);

        PostCategory::create([
            'name' => 'Webinar/Seminar',
            'slug' => 'webinar',
            'body' => 'Artikel tentang kegiatan Webinar atau Seminar yang diadakan olh STMIK Rosma maupun mahasiswa STMIK Rosma',
            'user_id'   => 1
        ]);

        Post::factory(20)->create();
    }
}
