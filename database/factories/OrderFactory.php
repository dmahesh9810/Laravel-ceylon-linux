<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Sku;
use App\Models\User;
use App\Services\IdGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'sku_id' => Sku::query()->inRandomOrder()->first()->id,
            'remark' => $this->faker->address,
            'qty' => $this->faker->randomDigit,
            'po_no' => IdGenerator::GenerateId(new Order(), 'po_no', 2, '000'),
            'date' => now(),
        ];
    }
}
