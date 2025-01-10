<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Periksa apakah admin sudah ada
        User::firstOrCreate(
            ['email' => 'hmsi@fmipa.com'], // Identifikasi berdasarkan email
            [
                'name' => 'Admin', // Nama admin
                'password' => Hash::make('admin123'), // Ganti dengan password aman
                'is_admin' => true, // Tambahkan field is_admin jika diperlukan
            ]
        );
    }
}
