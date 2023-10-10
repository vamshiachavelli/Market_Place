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
    public function definition()
    {
        return [
            'productTitle'=>$this->faker->text(20),
            'productDesc'=>$this->faker->text(100),
            'productPrice'=>$this->faker->text(20),
            'productImage'=>$this->faker->image,
        ];
    }
}
