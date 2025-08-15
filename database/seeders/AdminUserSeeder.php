<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@viscosity.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password123'), // ganti sesuai kebutuhan
                'role' => 'admin',
            ]
        );
    }
}
