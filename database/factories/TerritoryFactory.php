<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Territory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\IdGenerator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Territory>
 */
class TerritoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'region_id' => Region::query()->inRandomOrder()->first()->id,
            'code' => IdGenerator::GenerateId(new Territory(), 'code', 2, 'TER'),
            'name' => fake()->name()
        ];
    }
}
