<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected  $model=\App\Models\Product::class;

    public function definition()
    {
        $title=$this->faker->name();
        $description=$this->faker->text(200);
        // $image=$this->faker->image('public/images',640,480, null, false);
           
        return [
            'title'=>$title,
            'description'=>$description,
            'image'=>null
        ];
    }
   
}
