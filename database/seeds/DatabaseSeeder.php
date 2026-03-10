<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);   // Seeder untuk admin user
        $this->call(CategorySeeder::class);
         $this->call(ProductSeeder::class);    // Seeder untuk kategori warkop
        // Tambahkan seeder lain jika ada
    }
}
