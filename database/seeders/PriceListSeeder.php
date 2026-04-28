<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            ['item_id' => 1, 'category_id' => 1, 'service_id' => 1, 'price' => 15000], // Baju Satuan Cuci
            ['item_id' => 1, 'category_id' => 1, 'service_id' => 2, 'price' => 10000], // Baju Satuan Setrika
            
            ['item_id' => 2, 'category_id' => 1, 'service_id' => 1, 'price' => 20000], // Celana Satuan Cuci
            ['item_id' => 2, 'category_id' => 1, 'service_id' => 2, 'price' => 15000], // Celana Satuan Setrika
            
            ['item_id' => 1, 'category_id' => 2, 'service_id' => 1, 'price' => 8000],  // Baju Kiloan Cuci
            ['item_id' => 1, 'category_id' => 2, 'service_id' => 2, 'price' => 6000],  // Baju Kiloan Setrika
            
            ['item_id' => 2, 'category_id' => 2, 'service_id' => 1, 'price' => 10000], // Celana Kiloan Cuci
            ['item_id' => 2, 'category_id' => 2, 'service_id' => 2, 'price' => 8000],  // Celana Kiloan Setrika
        ];

        foreach ($prices as $price) {
            \App\Models\PriceList::create($price);
        }
    }
}
