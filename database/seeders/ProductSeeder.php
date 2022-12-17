<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
// use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //products 50K and pharmacy 20k

        \App\Models\Product::factory()->count(10000)->haspharmacies(6)->create();
        \App\Models\Product::factory()->count(20000)->haspharmacies(10)->create();
        \App\Models\Product::factory()->count(5000)->haspharmacies(3)->create();
        \App\Models\Product::factory()->count(15000)->haspharmacies(1)->create();


    }
}
