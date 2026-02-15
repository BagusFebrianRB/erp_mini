<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'code' => 'PRD001',
                'name' => 'Mouse Wireless Logitech',
                'category_id' => 1,
                'purchase_price' => 150000,
                'selling_price' => 200000,
                'stock' => 20,
                'min_stock' => 5,
            ],
            [
                'code' => 'PRD002',
                'name' => 'Keyboard Mechanical',
                'category_id' => 1,
                'purchase_price' => 300000,
                'selling_price' => 400000,
                'stock' => 15,
                'min_stock' => 5,
            ],
            [
                'code' => 'PRD003',
                'name' => 'Kaos Polos Cotton',
                'category_id' => 2,
                'purchase_price' => 35000,
                'selling_price' => 55000,
                'stock' => 50,
                'min_stock' => 10,
            ],
            [
                'code' => 'PRD004',
                'name' => 'Kopi Arabica 100gr',
                'category_id' => 3,
                'purchase_price' => 25000,
                'selling_price' => 40000,
                'stock' => 30,
                'min_stock' => 10,
            ],
            [
                'code' => 'PRD005',
                'name' => 'Pulpen Gel 0.5mm',
                'category_id' => 4,
                'purchase_price' => 3000,
                'selling_price' => 5000,
                'stock' => 100,
                'min_stock' => 20,
            ],
            [
                'code' => 'PRD006',
                'name' => 'Headset Gaming RGB',
                'category_id' => 5,
                'purchase_price' => 200000,
                'selling_price' => 300000,
                'stock' => 10,
                'min_stock' => 3,
            ],
            [
                'code' => 'PRD007',
                'name' => 'Powerbank 10000mAh',
                'category_id' => 1,
                'purchase_price' => 80000,
                'selling_price' => 120000,
                'stock' => 25,
                'min_stock' => 5,
            ],
            [
                'code' => 'PRD008',
                'name' => 'Tas Ransel Laptop',
                'category_id' => 2,
                'purchase_price' => 120000,
                'selling_price' => 180000,
                'stock' => 12,
                'min_stock' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
