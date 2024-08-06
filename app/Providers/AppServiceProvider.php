<?php

namespace App\Providers;

use App\Repositorys\Job\JobRepository;
use App\Repositorys\Job\JobRepositoryInterface;
use App\Repositorys\MyJobApplicationRepository\MyJobApplicationRepository;
use App\Repositorys\MyJobApplicationRepository\MyJobApplicationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(MyJobApplicationRepositoryInterface::class , MyJobApplicationRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
