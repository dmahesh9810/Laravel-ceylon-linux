<?php

namespace Database\Factories;

use App\Models\Sku;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\IdGenerator;


class SkuFactory extends Factory
{

    public function definition()
    {
        return [
            'sku_id' => IdGenerator::GenerateId(new Sku(), 'code', 2, 'SID'),
            'code' => IdGenerator::GenerateId(new Sku(), 'code', 2, 'SKU'),
            'name' => fake()->name(),
            'mrp' =>  $this->faker->randomFloat(2, 50, 500),
            'distributor_price' =>  $this->faker->randomFloat(2, 50, 500),
            'weight' =>  $this->faker->randomFloat(2, 50, 500),
            'weight_id' =>  $this->faker->randomElement(array('g', 'Kg', 'l', 'ml')),
        ];
    }
}
