<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan satu user dengan email testing@gmail.com
        DB::table('users')->insert([
            'name' => 'Testing User', // Ganti dengan nama yang Anda inginkan
            'email' => 'testing@gmail.com', // Email yang akan digunakan untuk login
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Password default: password
            'remember_token' => Str::random(10),
        ]);

        // Anda bisa menambahkan user lain di sini jika perlu
    }
}