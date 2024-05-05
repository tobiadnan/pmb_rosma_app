<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => '1',
            ],
        ];

        // Loop untuk membuat entri data
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
