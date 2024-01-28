<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::Factory(30)->create();

        $categories = [
            [
                'name' => 'Agriculture',
                'slug' => 'agriculture',
                'icon' => 'fas fa-tractor',
            ],
            [
                'name' => 'Artisanat',
                'slug' => 'artisanat',
                'icon' => 'fas fa-tools',
            ],
            [
                'name' => 'Commerce',
                'slug' => 'commerce',
                'icon' => 'fas fa-shopping-cart',
            ],
            [
                'name' => 'Industrie',
                'slug' => 'industrie',
                'icon' => 'fas fa-industry',
            ],
            [
                'name' => 'Services',
                'slug' => 'services',
                'icon' => 'fas fa-concierge-bell',
            ],
            [
                'name' => 'Tourisme',
                'slug' => 'tourisme',
                'icon' => 'fas fa-plane',
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'icon' => 'fas fa-bullhorn',
            ],
            [
                'name' => 'Communication',
                'slug' => 'communication',
                'icon' => 'fas fa-comments',
            ],
            [
                'name' => 'Informatique',
                'slug' => 'informatique',
                'icon' => 'fas fa-laptop-code',
            ],
            [
                'name' => 'Transport',
                'slug' => 'transport',
                'icon' => 'fas fa-truck',
            ],
            [
                'name' => 'Immobilier',
                'slug' => 'immobilier',
                'icon' => 'fas fa-building',
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'fas fa-money-bill-wave',
            ],
            [
                'name' => 'Santé',
                'slug' => 'sante',
                'icon' => 'fas fa-heartbeat',
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'icon' => 'fas fa-graduation-cap',
            ],
            [
                'name' => 'Sport',
                'slug' => 'sport',
                'icon' => 'fas fa-futbol',
            ],
            [
                'name' => 'Culture',
                'slug' => 'culture',
                'icon' => 'fas fa-theater-masks',
            ],
            [
                'name' => 'Autres',
                'slug' => 'autres',
                'icon' => 'fas fa-ellipsis-h',
            ],

        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }

        for ($i = 0; $i < 10; $i++) {
            $enterprise = [
                'user_id' => $i + 1,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'slug' => 'enterprise' . $i,
                'logo' => 'https://www.w3schools.com/w3css/img_lights.jpg' . $i,
                'website' => 'https://www.w3schools.com/w3css/img_lights.jpg'.$i,
            ];

            \App\Models\Enterprise::create($enterprise);
        }

        for ($i = 0; $i < 10; $i++) {
            $applicant = [
                'user_id' => $i + 1,
                'cv' => 'https://www.w3schools.com/w3css/img_lights.jpg' ,
                'photo' => 'https://www.w3schools.com/w3css/img_lights.jpg' ,
                'coverLetter' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'portfolio' => 'https://www.w3schools.com/w3css/img_lights.jpg' . $i,
            ];

            \App\Models\Applicant::create($applicant);
        }


        \App\Models\Job::factory(200)->create();

        $applicants = \App\Models\Applicant::all();
        $jobs = \App\Models\Job::all();

        foreach ($applicants as $applicant) {
            $applicant->jobs()->attach(
                $jobs->random(rand(1, 3))->pluck('id')->toArray()
            );
        }



    }
}
