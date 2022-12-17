<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected  $model=Pharmacy::class;

    public function definition()
    {
        $name=$this->faker->name();
        $address=$this->faker->address();
        return [
            'name'=>$name,
            'address'=>$address
        ];
    }
}
