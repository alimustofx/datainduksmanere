<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama_lengkap' => 'Admin Utama SMAN 1 Turen',
            'username' => 'admin_turen',
            'email' => 'admin@sman1turen.sch.id',
            'password' => Hash::make('rahasia123'), // Ganti dengan password yang Anda inginkan
            'role' => 'superadmin'
        ]);
    }
}