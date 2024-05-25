<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Premium'
            ],
            [
                'name' => 'Medium'
            ],
        ];

        foreach ($data as $key => $d) {
            ProductCategory::create($d);
        }
    }
}
