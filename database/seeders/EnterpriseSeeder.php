<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $enterprise = [
                'user_id' => $i + 1,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'slug' => 'enterprise' . $i,
                'logo' => 'https://www.w3schools.com/w3css/img_lights.jpg',
                'website' => 'https://www.w3schools.com/w3css/img_lights.jpg',
            ];

            \App\Models\Enterprise::create($enterprise);
        }
    }
}
