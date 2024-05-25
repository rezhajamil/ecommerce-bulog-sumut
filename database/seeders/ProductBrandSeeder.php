<?php

namespace Database\Seeders;

use App\Models\ProductBrand;
use d\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Andaliman'
            ],
            [
                'name' => 'Premium'
            ],
            [
                'name' => 'Danau Toba'
            ],
            [
                'name' => 'Nanas Madu'
            ],
        ];

        foreach ($data as $key => $d) {
            ProductBrand::create($d);
        }
    }
}
