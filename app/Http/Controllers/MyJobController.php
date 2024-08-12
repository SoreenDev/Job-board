<?php

namespace App\Http\Controllers;

use App\Http\Requests\job\JobStoreRequest;
use App\Models\Job;

class MyJobController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Job::class);
        return view('my_job.index',
        [
            'jobs' => auth()->user()->employer->jobs()->with('employer', 'job_applications','job_applications.user')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobStoreRequest $request)
    {
        $this->authorize('create', Job::class);

        $request->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my_jobs.index')->with('success', 'Job has been created.');
    }

    /**
     * Display the specified resource.
     */

    public function edit(Job $my_job)
    {
        return view('my_job.edite', ['job' => $my_job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobStoreRequest $request, Job $my_job)
    {
        $this->authorize('update',[ Job::class , $my_job]);

        $my_job->update($request->validated());
        return redirect()->route('my_jobs.index')->with('success', 'Job updated successfully .');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $my_job)
    {
        $this->authorize('delete',[ Job::class , $my_job]);
        $my_job->delete();

        return redirect()->route('my_jobs.index')->with('success', 'Job delete successfully .');

    }
}
