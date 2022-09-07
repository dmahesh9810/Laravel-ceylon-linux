<?php

namespace Database\Factories;

use App\Models\zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\IdGenerator;

class ZoneFactory extends Factory
{
    public function definition()
    {
        return [
            'code' => IdGenerator::GenerateId(new zone(), 'code', 2, 'ZON'),
            'discription' => fake()->text(),
            'short_discription' => fake()->text()
        ];
    }
}
