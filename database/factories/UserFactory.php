<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'url_img' => 'https://picsum.photos/50/50',
            'desc_short' => fake()->sentence(),
            'desc_long' => fake()->paragraph(),
            'url_fb' => fake()->url(),
            'url_tw' => fake()->url(),
            'url_ig' => fake()->url(),
            'url_yt' => fake()->url(),
            'url_website' => fake()->url(),
            'is_active' => rand(0, 1),
            'role' => ['admin', 'user'][rand(0, 1)],
            'company' => rand(0,10),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
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
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
