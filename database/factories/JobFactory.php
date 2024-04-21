<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->jobTitle,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'requirements' => $this->faker->text,
            'responsibilities' => $this->faker->text,
            'salary' => $this->faker->randomFloat(2, 1000, 10000) . '€' . '/' . $this->faker->randomElement(['hour', 'month', 'year']),
            'location' => $this->faker->city,
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'freelance', 'internship']),
            'category_id' => $this->faker->numberBetween(1, 10),
            'enterprise_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'limit_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
