<?php

namespace App\Http\Controllers;

use App\Http\Requests\jobApplication\StoreJobApplicationRequest;
use App\Models\Job;
use App\Policies\JobPolicy;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobApplicationRequest $request  , Job $job)
    {
        $job->job_applications()->create([
            'user_id' => auth()->id(),
            'salary' => $request->validated()['expected_salary'],
        ]);
        return redirect()->route('job.show',$job)->with('success', 'Job Application Submitted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
