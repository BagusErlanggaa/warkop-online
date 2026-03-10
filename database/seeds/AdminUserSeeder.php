<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User; // Sesuaikan namespace User model kamu

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@warkop.com'], // cek berdasarkan email
            [
                'name' => 'Admin Warkop',
                'password' => Hash::make('12345678'), // ganti password sesuai kebutuhan
                'is_admin' => true, // atau 1
            ]
        );
    }
}
