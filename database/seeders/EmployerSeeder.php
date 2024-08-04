<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all()->pluck('id')->shuffle();

        for ($i = 0 ; $i < 30 ; $i++)
        {
            $employer = Employer::factory()->create(['user_id' => $users->pop()]);
            Job::factory(rand(1,4))->create(['employer_id'=> $employer->id]);

        }
    }
}
