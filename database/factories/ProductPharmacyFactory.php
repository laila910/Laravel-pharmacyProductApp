<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use App\Models\Product;
use App\Models\ProductPharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected  $model=ProductPharmacy::class;

    public function definition()
    {
        return [
            'product_id'=>Product::factory(),
            'pharmacy_id'=>Pharmacy::factory(),
            'price'=>$this->faker->numberBetween(100,2000),
            'quantity'=>$this->faker->numberBetween(5,5000)
        ];
    }
}
