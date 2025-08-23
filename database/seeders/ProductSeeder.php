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
                'satuan' => 'pcs',
            ],
            [
                'kode_produk' => 'P002',
                'nama_produk' => 'Smartphone Samsung',
                'kategori' => 'Elektronik',
                'harga_beli' => 3000000,
                'harga_jual' => 3500000,
                'stok' => 15,
                'satuan' => 'pcs',
            ],
            [
                'kode_produk' => 'P003',
                'nama_produk' => 'Kemeja Formal',
                'kategori' => 'Pakaian',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
                'stok' => 25,
                'satuan' => 'pcs',
            ],
            [
                'kode_produk' => 'P004',
                'nama_produk' => 'Beras Premium',
                'kategori' => 'Makanan',
                'harga_beli' => 12000,
                'harga_jual' => 15000,
                'stok' => 100,
                'satuan' => 'kg',
            ],
            [
                'kode_produk' => 'P005',
                'nama_produk' => 'Minyak Goreng',
                'kategori' => 'Makanan',
                'harga_beli' => 18000,
                'harga_jual' => 22000,
                'stok' => 50,
                'satuan' => 'liter',
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
