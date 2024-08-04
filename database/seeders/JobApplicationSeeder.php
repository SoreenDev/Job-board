<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all()->pluck('id')->shuffle();
        $jobs = Job::all()->pluck('id')->shuffle();

        foreach($users as $user)
        {
            $random_jobs = $jobs->random(rand(1,3));
            foreach ($random_jobs as $job)
                JobApplication::factory()->create([
                    'user_id' => $user,
                    'job_id' => $job
                ]);
        }
    }
}
