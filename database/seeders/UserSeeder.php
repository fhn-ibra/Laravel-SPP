<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $users = [[
            'username' => 'ibra',
            'password' => bcrypt('ibra'),
            'nama_petugas' => 'Farhan Ibra',
            'level' => 'admin'
        ]];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
