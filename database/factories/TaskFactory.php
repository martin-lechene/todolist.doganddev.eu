<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->words(3, true),
            "completed" => rand(0, 1),
            "user_id" => $this->faker->numberBetween(1, 10),
            "company_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
