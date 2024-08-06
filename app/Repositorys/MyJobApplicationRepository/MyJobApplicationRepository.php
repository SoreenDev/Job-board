<?php

namespace App\Repositorys\MyJobApplicationRepository;


use App\Models\User;

class MyJobApplicationRepository implements MyJobApplicationRepositoryInterface
{
    public function getAll(User $user)
    {
        return $user->jobapplication()->with(
            [
                'job'=> fn($q) => $q->withCount('job_applications')->withAvg('job_applications', 'salary')
                ,'job.employer'
            ])
            ->latest()->get();

    }
}
