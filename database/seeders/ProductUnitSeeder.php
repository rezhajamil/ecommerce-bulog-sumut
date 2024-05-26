<?php

namespace Database\Seeders;

use App\Models\ProductUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Kg',
                'description' => 'Kilogram'
            ],
            [
                'name' => 'Sack',
            ],
        ];

        foreach ($data as $key => $d) {
            ProductUnit::create($d);
        }
    }
}
