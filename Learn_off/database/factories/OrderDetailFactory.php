<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'=>Order::all()->random()->id,
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime,
            'product_id'=>Product::all()->random()->id,
            'quantity'=>$this->faker->randomNumber(3),
            'price'=>$this->faker->randomFloat(2,1,100),
        ]; 
    }
}
