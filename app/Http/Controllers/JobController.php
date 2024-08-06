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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
