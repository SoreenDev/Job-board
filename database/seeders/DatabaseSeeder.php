<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(EmployerSeeder::class); # create fake jobs data on Employer seeder
        $this->call(JobApplicationSeeder::class);
        User::factory()->create(
            [
                'name' => 'MJman',
                'email' => 'mjman@gmail.com',
            ]
        );
    }
}
