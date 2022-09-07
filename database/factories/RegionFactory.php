<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\IdGenerator;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'zone_id' => zone::query()->inRandomOrder()->first()->id,
            'region_code' => IdGenerator::GenerateId(new Region(), 'code', 2, 'REG'),
            'region_name' => fake()->name()
        ];
    }
}
