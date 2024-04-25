<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Prodie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_prodi' => 'RSMTIS1', 'prodi' => 'Teknik Informatika'],
            ['kode_prodi' => 'RSMSIS1', 'prodi' => 'Sistem Informasi'],
            ['kode_prodi' => 'RSMMID3', 'prodi' => 'Manajemen Informatika'],
            ['kode_prodi' => 'RSMKAD3', 'prodi' => 'Komputerisasi Akuntansi'],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk membuat entri data
        foreach ($data as $item) {
            Prodie::create($item);
        }
    }
}
