<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [[
            'username' => 'ibra',
            'level' => 'admin',
            'nama_petugas' => 'Farhan Ibra',
            'password' => bcrypt('ibra'),
        ],
        ['username' => 'tes',
        'level' => 'petugas',
        'nama_petugas' => 'Test',
        'password' => bcrypt('tes')]];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
