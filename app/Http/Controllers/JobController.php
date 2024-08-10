<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Repositorys\Job\JobRepositoryInterface;
    use Illuminate\Http\Request;

class JobController extends Controller
{
    protected JobRepositoryInterface $jobRepository;
    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function index( Request $request)
    {

        $filters = $request->only('search','experience','category','min_salary','max_salary');

        return view('job.index',['jobs' => $this->jobRepository->filter($filters) ]);
    }

    public function show(Job $job)
    {
        return view('job.show',compact('job'));
    }
}
