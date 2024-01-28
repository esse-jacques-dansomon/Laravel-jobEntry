<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Applicant;
use App\Models\Category;
use App\Models\Enterprise;
use App\Models\Testimony;
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
        $this->call([
            CategorySeeder::class,
        ]);

        User::Factory(30)->create();



        for ($i = 0; $i < 10; $i++) {
            Enterprise::factory(1)->create([
                'user_id' => $i + 1,
            ]);
        }

        //set role
        $enterprises = \App\Models\Enterprise::all();
        foreach ($enterprises as $enterprise) {
            $enterprise->user->role = 'enterprise';
            $enterprise->user->save();
        }

        for ($i = 10; $i < 20; $i++) {
           Applicant::factory(1)->create([
                'user_id' => $i + 1,
            ]);
        }

        //set role
        $applicants = \App\Models\Applicant::all();
        foreach ($applicants as $applicant) {
            $applicant->user->role = 'applicant';
            $applicant->user->save();

            Testimony::factory(1)->create([
                'user_id' => $applicant->id,
            ]);
        }

        \App\Models\Job::factory(500)->create();

        $applicants = \App\Models\Applicant::all();
        $jobs = \App\Models\Job::all();

        foreach ($applicants as $applicant) {
            $applicant->jobs()->attach(
                $jobs->random(rand(1, 3))->pluck('id')->toArray()
            );
        }


    }
}
