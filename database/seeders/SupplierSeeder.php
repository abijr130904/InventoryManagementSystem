<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'nama' => 'PT Elektronik Jaya',
                'email' => 'contact@elektronikjaya.com',
                'telepon' => '021-5551234',
                'kontak' => 'Budi Santoso',
                'alamat' => 'Jl. Raya Elektronik No. 123, Jakarta',
            ],
            [
                'nama' => 'CV Fashion Indonesia',
                'email' => 'info@fashionindonesia.com',
                'telepon' => '021-7778899',
                'kontak' => 'Siti Rahayu',
                'alamat' => 'Jl. Mode No. 45, Bandung',
            ],
        ];

        foreach ($suppliers as $supplier) {
            \App\Models\Supplier::create($supplier);
        }
    }
}
