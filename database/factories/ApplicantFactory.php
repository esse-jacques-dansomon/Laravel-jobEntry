<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //        'user_id',
        //        'cv',
        //        'photo',
        //        'coverLetter',
        //        'portfolio',
        return [
            'user_id' => $this->faker->numberBetween(11, 20),
            'cv' => $this->faker->url(),
            'photo' => $this->faker->imageUrl(640, 480, 'cats'),
            'coverLetter' => $this->faker->text(200)    ,
            'portfolio' => $this->faker->url(),
        ];
    }
}
