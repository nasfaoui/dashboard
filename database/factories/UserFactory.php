<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'telephone' => $this->faker->phoneNumber(),
            'bio' => $this->faker->text(200),
            'lastName' => $this->faker->lastName(),
            'ville' => $this->faker->city(),
            'image' => $this->faker->imageUrl(),
            'isArtisan' => $this->faker->boolean(),

        ];
    }
}
