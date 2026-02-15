<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'code' => 'SUP001',
                'name' => 'PT Maju Jaya',
                'phone' => '081234567890',
                'address' => 'Jl. Sudirman No. 123, Jakarta'
            ],
            [
                'code' => 'SUP002',
                'name' => 'CV Berkah Abadi',
                'phone' => '081234567891',
                'address' => 'Jl. Gatot Subroto No. 45, Surabaya'
            ],
            [
                'code' => 'SUP003',
                'name' => 'Toko Sejahtera',
                'phone' => '081234567892',
                'address' => 'Jl. Ahmad Yani No. 78, Bandung'
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
