<?php

use Illuminate\Database\Seeder;
use App\Category; // Sesuaikan dengan namespace model kamu

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'nama' => 'Minuman Kopi',
                'deskripsi' => 'Berbagai jenis kopi spesial dari biji pilihan.'
            ],
                        [
                'nama' => 'Makanan Berat',
                'deskripsi' => 'Makanan seperti nasi, mie, soto, lainnya.'
            ],
            [
                'nama' => 'Paket Hemat',
                'deskripsi' => 'Paket kombo makanan dan minuman dengan harga spesial.'
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['nama' => $category['nama']],
                ['deskripsi' => $category['deskripsi']]
            );
        }
    }
}
