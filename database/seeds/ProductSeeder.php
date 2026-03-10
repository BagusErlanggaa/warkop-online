<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua kategori yang ada
        $categories = Category::all()->keyBy('nama');

        $products = [
            [
                'nama' => 'Kopi Hitam',
                'category' => 'Minuman Kopi',
                'harga' => 10000,
                'photo' => 'kopi-hitam.jpg',
                'deskripsi' => 'Kopi hitam asli tanpa campuran gula.'
            ],
            [
                'nama' => 'Nasi Goreng Spesial',
                'category' => 'Makanan Berat',
                'harga' => 20000,
                'photo' => 'nasi-goreng.jpg',
                'deskripsi' => 'Nasi goreng lengkap dengan telur dan ayam.'
            ],
            [
                'nama' => 'Paket Santuy 1',
                'category' => 'Paket Hemat',
                'harga' => 25000,
                'photo' => 'paket-santuy-1.jpg',
                'deskripsi' => 'Paket nasi goreng + es teh manis.'
            ],
        ];

        foreach ($products as $product) {
            // Cari ID kategori berdasarkan nama
            $categoryId = $categories[$product['category']]->category_id ?? null;

            if ($categoryId) {
                Product::updateOrCreate(
                    ['nama' => $product['nama']],
                    [
                        'category_id' => $categoryId,
                        'harga' => $product['harga'],
                        'photo' => $product['photo'],
                        'deskripsi' => $product['deskripsi'],
                    ]
                );
            }
        }
    }
}
