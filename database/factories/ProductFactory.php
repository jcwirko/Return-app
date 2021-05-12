<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Product {$this->faker->firstName}",
            'description' => $this->faker->text(30),
            'unit_price' => $this->faker->randomFloat(2, 1, 200),
            'quantity' => $this->faker->randomDigit,
            'total_cost' => $this->faker->randomFloat(2, 100, 1000)
        ];
    }
}
