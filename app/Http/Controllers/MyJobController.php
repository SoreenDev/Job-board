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
        $request->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success', 'Job has been created.');
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
        $my_job->update($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job updated successfully .');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
