<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'KOMPLEKS PERGUDANGAN MABAR',
                'address' => 'Medan Mabar'
            ],
            [
                'name' => 'KOMPLEKS PERGUDANGAN PULO BRAYAN DARAT II',
                'address' => 'PULO BRAYAN DARAT'
            ],
        ];

        foreach ($data as $key => $d) {
            Warehouse::create($d);
        }
    }
}
