<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'kode_produk' => 'P001',
                'nama_produk' => 'Laptop Asus',
                'kategori' => 'Elektronik',
                'harga_beli' => 8000000,
                'harga_jual' => 9500000,
                'stok' => 10,
            ],
            [
                'kode_produk' => 'P002',
                'nama_produk' => 'Smartphone Samsung',
                'kategori' => 'Elektronik',
                'harga_beli' => 3000000,
                'harga_jual' => 3500000,
                'stok' => 15,
            ],
            [
                'kode_produk' => 'P003',
                'nama_produk' => 'Kemeja Formal',
                'kategori' => 'Pakaian',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
                'stok' => 25,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
