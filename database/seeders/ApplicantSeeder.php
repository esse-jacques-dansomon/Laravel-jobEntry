<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $applicant = [
                'user_id' => $i + 1,
                'cv' => 'https://www.w3schools.com/w3css/img_lights.jpg',
                'photo' => 'https://www.w3schools.com/w3css/img_lights.jpg',
                'coverLetter' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'portfolio' => 'https://www.w3schools.com/w3css/img_lights.jpg',
            ];

            \App\Models\Applicant::create($applicant);
        }


    }
}
