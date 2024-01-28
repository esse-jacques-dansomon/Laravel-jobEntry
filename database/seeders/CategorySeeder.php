<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            \App\Models\Category::factory()->create($category);
        }
    }
}
