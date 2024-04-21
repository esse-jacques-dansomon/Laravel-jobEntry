<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */
class EnterpriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //description, slug, logo, website, user_id
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text(100),
            'slug' => $this->faker->slug(2),
            'logo' => $this->faker->imageUrl(640, 480),
            'website' => $this->faker->url(),
        ];
    }
}
