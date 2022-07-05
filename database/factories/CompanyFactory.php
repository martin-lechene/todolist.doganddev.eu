<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'desc_short' => $this->faker->sentence,
            'desc_long' => $this->faker->paragraph,
            'url_img' => $this->faker->imageUrl,
            'url_web' => "http://test.test/",
            'url_fb' => $this->faker->url,
            'url_tw' => $this->faker->url,
            'url_ig' => $this->faker->url,
            'url_yt' => $this->faker->url,
            'user_id' => rand(1, 20),
        ];
    }
}
