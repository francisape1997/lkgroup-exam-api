<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return
        [
            'first_name'    => $this->faker->firstName(),
            'second_name'   => $this->faker->boolean() ? $this->faker->firstName() : null,
            'last_name'     => $this->faker->lastName(),
            'date_of_birth' => now(),
            'height'        => f_rand(10, 274, 2),
            'weight'        => f_rand(10, 500, 2),
            'form'          => rand(1, 10),
            'influence'     => f_rand(1, 20, 2),
            'creativity'    => f_rand(1, 20, 2),
            'threat'        => f_rand(1, 20, 2),
        ];
    }
}
