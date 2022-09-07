<?php

namespace Database\Factories;

use App\Models\Territory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'nic' => $this->faker->randomNumber(),
            'address' => $this->faker->address,
            'mobile' => $this->faker->unique()->phoneNumber,
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'gender' => $this->faker->randomElement(array('Male', 'Female')),
            'territory_id' => Territory::query()->inRandomOrder()->first()->id,
            'user_name' => Str::slug($this->faker->unique()->name(), '_'),
            'password' => Hash::make('password'), // $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
