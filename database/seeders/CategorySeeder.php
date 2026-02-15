<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik'],
            ['name' => 'Fashion'],
            ['name' => 'Makanan & Minuman'],
            ['name' => 'Alat Tulis'],
            ['name' => 'Aksesoris'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
